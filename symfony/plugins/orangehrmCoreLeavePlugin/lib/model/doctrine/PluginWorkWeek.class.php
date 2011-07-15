<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class PluginWorkWeek extends BaseWorkWeek
{
    const WORKWEEK_LENGTH_FULL_DAY 	= 0;
    const WORKWEEK_LENGTH_HALF_DAY 	= 4;
    const WORKWEEK_LENGTH_WEEKEND 	= 8;

    private $daysList = array(1=>'Monday', 2=>'Tuesday', 3=>'Wednesday', 4=>'Thursday', 5=>'Friday', 6=>'Saturday', 7=>'Sunday');

    private $daysLengthList = array ( 0 => 'Full Day', 4=> 'Half Day', 8 => 'Non-working Day');

    private $yesNoList = array ( 0 => 'No', 1=> 'Yes');


    /**
     * Return Possible Days List
     *
     * @return array $daysList
     * 
     */
    public function  getDaysList()
    {
        return $this->daysList;
    }

    /**
     * Return Possible weights for all days
     *
     * @return array $daysLengthList
     * 
     */
    public function getDaysLengthList()
    {
        return $this->daysLengthList;
    }

    /**
     * return name of the week by given day
     * @param integer $id
     * @return string
     * 
     */
    public function getDayById($id)
    {
        if( array_key_exists($id, $this->daysList) )
        {
            return $this->daysList[$id];
        }
        else
        {
            throw new LeaveServiceException('Invalid Day');
        }
    }

    /**
     * Return Yes No List
     * @return array yesNoList
     * 
     */
    public function getYesNoList()
    {
        return $this->yesNoList;
    }
}