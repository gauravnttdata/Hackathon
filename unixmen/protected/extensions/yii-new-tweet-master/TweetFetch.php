<?php

/**
 * The custom action that handles the Twitter authentication and fetching of tweets.
 *
 * @author Richard
 */
class TweetFetch extends CAction {

// Your Twitter App Consumer Key
    private $consumer_key = '3815qj27yo1s3ZKAuZMBrg';
    private $consumer_secret = '7ORvn3V83uZs3PvDp17ZFww2rmNN35fTDTdZJ4MJROY';
    private $user_token = '76375236-5Exmg74VViYWaZVJqbaY8RjOgChdKyN5LnX5XBiCj';
    private $user_secret = '43vMwa5QVaan134tJveFth0rF2HAXm2PVHMGdh10';
    private $cache_enabled = true;
    private $cache_reset = false;
    private $cache_interval = 5;
    private $debug = true;
    private $message = 'Fetching Tweets Message.';

    public function run() {
        echo json_encode(
                array(
                    'response' => json_decode($this->getJSON(), true),
                    'message' => ($this->debug) ? $this->message : false
                )
        );
        Yii::app()->end();
    }

    private function getJSON() {
        if ($this->cache_enabled === true) {
            $CFID = $this->generateCFID();
            if ($this->cache_reset) {
                Yii::app()->cache->delete($CFID);
            }
            if(Yii::app()->cache != null){
            	$data = Yii::app()->cache->get($CFID);
            }
            else{
            	$data = false;
            }

            if ($data !== false) {
                return $data;
            } else {

                $JSONraw = $this->getTwitterJSON();
                $JSON = $JSONraw['response'];

                // Don't write a bad cache file if there was a CURL error
                if ($JSONraw['errno'] != 0) {
                    $this->consoleDebug($JSONraw['error']);
                    return $JSON;
                }

                if ($this->debug === true) {
                    // Check for twitter-side errors
                    $pj = CJSON::decode($JSON, true);
                    if (isset($pj['errors'])) {
                        foreach ($pj['errors'] as $error) {
                            $message = 'Twitter Error: "' . $error['message'] . '", Error Code #' . $error['code'];
                            $this->consoleDebug($message);
                        }
                        return false;
                    }
                }
                if (isset(Yii::app()->cache) && $JSONraw && isset($JSONraw['code']) && $JSONraw['code'] == 200) {
                    Yii::app()->cache->set($CFID, $JSON, $this->cache_interval * 60);
                } else {
                    $this->consoleDebug("There was no json data.");
                }
                return $JSON;
            }
        } else {
            $JSONraw = $this->getTwitterJSON();

            if ($this->debug === true) {
                // Check for CURL errors
                if ($JSONraw['errno'] != 0) {
                    $this->consoleDebug($JSONraw['error']);
                }

                // Check for twitter-side errors
                $pj = CJSON::decode($JSONraw['response'], true);
                if (isset($pj['errors'])) {
                    foreach ($pj['errors'] as $error) {
                        $message = 'Twitter Error: "' . $error['message'] . '", Error Code #' . $error['code'];
                        $this->consoleDebug($message);
                    }
                    return false;
                }
            }
            return $JSONraw['response'];
        }
    }

    private function getTwitterJSON() {
        require_once dirname(__FILE__) . '/lib/tmhOAuth.php';
        require_once dirname(__FILE__) . '/lib/tmhUtilities.php';

        $tmhOAuth = new tmhOAuth(array(
            'host' => $_POST['request']['host'],
            'consumer_key' => $this->consumer_key,
            'consumer_secret' => $this->consumer_secret,
            'user_token' => $this->user_token,
            'user_secret' => $this->user_secret,
            'curl_ssl_verifypeer' => false
        ));

        $url = $_POST['request']['url'];
        $params = $_POST['request']['parameters'];
var_dump($url);
var_dump($params);
        $tmhOAuth->request('GET', $tmhOAuth->url($url), $params);
        var_dump($tmhOAuth->response);
        return $tmhOAuth->response;
    }

    private function generateCFID() {
        // The unique cached filename ID
        return md5(serialize($_POST)) . '.json';
    }

    private function pathify(&$path) {
        // Ensures our user-specified paths are up to snuff
        $path = realpath($path) . '/';
    }

    private function consoleDebug($message) {
        if ($this->debug === true) {
            $this->message .= 'tweet.js: ' . $message . "\n";
        }
    }

}

?>
