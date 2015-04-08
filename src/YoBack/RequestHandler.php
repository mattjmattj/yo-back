<?php
/**
 * This file is part of mattjmattj/yo-back
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license BSD-2-Clause
 */

namespace YoBack;

/**
 * HTTP request handling and parsing. Implements a Yo API callback
 */
class RequestHandler
{
    /**
     * @param array $get - typically $_GET
     * @throws Exception - on error
     */
    public function handle(array $get)
    {
        if (!isset($get['username'])) {
            throw new \Exception('Bad request', 400);
        }
        
        $this->username = $get['username'];
        
        $this->payload = null;
        if (isset($get['link'])) {
            $this->payload = new \Yo\Link($get['link']);
        } elseif (isset($get['location'])) {
            $location = explode(';', $get['location']);
            if (count($location) !== 2) {
                throw new \Exception('Bad request', 400);
            }
            $this->payload = new \Yo\Location($location[0], $location[1]);
        }
    }
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function getPayload()
    {
        return $this->payload;
    }
}
