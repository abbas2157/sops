<?php
namespace App\Services;

use Google\Client;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;
use Google\Service\Calendar\EventDateTime;
use Illuminate\Support\Facades\Session;

class GoogleCalendarService
{
    protected $client;
    protected $calendar;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setAuthConfig(public_path('client_secret.json'));
        $this->client->setScopes([Calendar::CALENDAR_EVENTS]);
        $this->client->setAccessType('offline');
        $this->client->setPrompt('consent');

        if (Session::has('google_token')) {
            $this->client->setAccessToken(Session::get('google_token'));
        }
        
        $this->calendar = new Calendar($this->client);
    }
    
    public function createGoogleMeetEvent($eventData)
    {
        $event = new Event([
            'summary' => $eventData['summary'],
            'start' => new EventDateTime([
                'dateTime' => $eventData['start'],
                'timeZone' => $eventData['timeZone'],
            ]),
            'end' => new EventDateTime([
                'dateTime' => $eventData['end'],
                'timeZone' => $eventData['timeZone'],
            ]),
            'conferenceData' => [
                'createRequest' => [
                    'requestId' => 'randomString', // Should be unique for each event
                    'conferenceSolutionKey' => ['type' => 'hangoutsMeet'],
                ],
            ],
        ]);

        $calendarId = 'primary';  // Or another calendar ID
        $event = $this->calendar->events->insert($calendarId, $event, ['conferenceDataVersion' => 1]);

        return $event;
    }

    public function authenticate()
    {
        if (isset($_GET['code'])) {
            $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
            session(['google_token' => $token]);
            return redirect()->route('admin.workshops')->send();
        } else {
            return redirect()->to($this->client->createAuthUrl());
        }
    }
}