<?php

include ('SeriesIterator.php');

class Series
{
    private $seriesIterator = array();

    function __construct($data)
    {
        $this->seriesIterator = new SeriesIterator($data);
    }

    public function getIterator()
    {
        return $this->seriesIterator;
    }

    public function getSeasons()
    {
        return $this->seriesIterator->getSeasons();
    }

    public function gettEpisodes()
    {
        return $this->seriesIterator->getEpisodes();
    }

    public function getNextEpisode($episode)
    {
        $nextEpisode = null;
        $iterator = $this->seriesIterator;
        foreach ($iterator as $s) {
            if ($iterator->key() == $episode) {
                $iterator->next();
                if ($iterator->valid()) {
                    $nextEpisode = $iterator->key();
                }
                break;
            }
        }
        return $nextEpisode;
    }

    public function getNextSeason($season)
    {
        $seasons = $this->getSeasons();
        $key = -1;
        foreach ($seasons as $k => $s) {
            if ($s == $season) {
                $key = $k+1;
                break;
            }
        }
        $season = null;
        if (isset($seasons[$key])) {
            $season = $seasons[$key];
        }
        return $season;
    }
}
