<?php

class SeriesIterator implements Iterator
{
    private $program = array();
    private $episodes = array();
    private $seasons = array();
    private $positionSeason = 0;
    private $positionEpisode = 0;

    function __construct($program)
    {
        $seasons = array_keys($program);
        sort($seasons);
        $episodes = array();
        foreach ($seasons as $id => $seasonId) {
            $season = $program[$seasonId];
            ksort($season);
            $episodes[$seasonId] = array_keys($season);
        }
        $this->seasons = $seasons;
        $this->episodes = $episodes;
        $this->program = $program;
    }

    public function getSeasons()
    {
        return $this->seasons;
    }

    public function getEpisodes()
    {
        return $this->episodes;
    }

    public function current()
    {
        $s = $this->seasons[$this->positionSeason];
        $e = $this->episodes[$s][$this->positionEpisode];
        return $this->program[$s][$e];
    }

    public function next()
    {
        if (isset($this->seasons[$this->positionSeason])) {
            $s = $this->seasons[$this->positionSeason];
            if (isset($this->episodes[$s][$this->positionEpisode+1])) {
                $this->positionEpisode++;
            } else {
                $this->positionSeason ++;
                $this->positionEpisode = 0;
            }
        }
    }

    public function key()
    {
        $c = $this->current();
        return $c['id'];
    }

    public function getSeason()
    {
        $c = $this->current();
        return $c['season'];
    }

    public function getProgram()
    {
        $c = $this->current();
        return $c['program'];
    }

    public function valid()
    {
        $flag = false;
        if (isset($this->seasons[$this->positionSeason])) {
            $s = $this->seasons[$this->positionSeason];
            if (isset($this->episodes[$s][$this->positionEpisode])) {
                $flag = true;
            }
        }
        return $flag;
    }

    public function rewind()
    {
        $this->positionSeason = 0;
        $this->positionEpisode = 0;
    }
}
