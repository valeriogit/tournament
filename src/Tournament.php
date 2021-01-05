<?php

namespace Valeriogit\Tournament;

class Tournament
{
    /**
    * List of method for take Tournaments
    */
        private static function getTournamentsApi($state, $type){
            $api = env('API_CHALLONGE');

            $query = array(
                        'api_key'   => $api,
                        'state'     => $state
                    );

            if($type != ''){
                $type = strtolower($type);

                $query['type'] = $type;
            }

            $query = http_build_query($query);

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 
                'https://api.challonge.com/v1/tournaments.json?'.$query,

              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return json_decode($response, true);
        }


        public static function allTournaments($type='')
        {
            $state = 'all';       
            return self::getTournamentsApi($state,$type);
        }

        public static function pendingTournaments($type = '')
        {
            $state = 'pending';
            return self::getTournamentsApi($state, $type);
        }

        public static function inProgressTournaments($type = '')
        {
            $state = 'in_progress';
            return self::getTournamentsApi($state, $type);
        }

        public static function endedTournaments($type = '')
        {
            $state = 'ended';
            return self::getTournamentsApi($state, $type);
        }

    /**
    * List of method for take a specific Tournament
    */
        private static function getTournamentApi($id, $participants, $matches){
            $api = env('API_CHALLONGE');

            $query = array(
                'api_key' => $api,
                'include_participants' => $participants,
                'include_matches' => $matches
            );
            $query = http_build_query($query);

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 
                'https://api.challonge.com/v1/tournaments/'.$id.'.json?'.$query,

              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return json_decode($response, true);
        }

        public static function getTournament($id, $participants = false, $matches = false)
        {
            return self::getTournamentApi($id, $participants, $matches);
        }

}