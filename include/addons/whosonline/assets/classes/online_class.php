<?php

	/*==================================================================*\
	######################################################################
	#                                                                    #
	# Copyright 2010 Dynno.net . All Rights Reserved.                    #
	#                                                                    #
	# This file may not be redistributed in whole or part.               #
	#                                                                    #
	# Developed by: $ID: 1 $UNI: Imad Jomaa                              #
	# ----------------------- THIS FILE PREFORMS ----------------------- #
	#                                                                    #
	# MySQL Class                                                        #
	######################################################################
	\*==================================================================*/


//lets first check if IN_WOL is defined
if (!defined("IN_WOL")) { die(header("Location: ../index.php")); }

Class Online_list 
{
    /******
     * User | Guest OR Not
     * @var
     */
    
    var $user;
    
    /******
     * The time the user is considered online
     * @var
     */
    
    var $time;
    
    /******
     * The page location the user is on
     * @var
     */
    
    var $page;
    
    /******
     * The domain of this site
     * @var
     */
    
    var $domain;
    
    /******
     * The IP of the user
     * @var
     */
    
    var $ip;
    
    //now construct the delicious cosntructor =D
    
    function __construct($time, $domain)
    {
        //define some sweeties
        $this->user   = @$user;
        $this->time   = @$time;
        $this->page   = @$page;
        $this->domain = @$domain;
        $this->ip     = @$ip;
        
        
        //now convert the time
        $this->time = ($this->time * 60);
        
    }
    
    /******
     * This locates the page the user is currently on
     * @return string
     */
    
    public function pageLocator()
    {
        //firstly, compare domains
        $grabbed_domain = @$_SERVER['HTTP_REFERER'];
        
        if($grabbed_domain == '')
        {
            $this->page = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        }
        
        else
        {
            $grabbed_domain = preg_match("^$this->domain^", $grabbed_domain);
            
            if($grabbed_domain != true)
            {
                //for security issues, let's return this as N/A
                $this->page = "N/A";
            }
            
            else
            {
                //lets continue
                $this->page = $_SERVER['HTTP_REFERER'];
            }
        }
        
        //for security purposes, let's do a slight clean up on the URL
        //it doesn't do much, but it helps. However, we did do a major security audit with the domain
        
        $this->page = strip_tags($this->page);

        //now output the page
        return $this->page;
        
    }
    
    /******
     * This grabs the users real IP
     * @return 
     */
    
    function ipGrabber()
    {
        if(!empty($_SERVER['HTTP_CLIENT_IP']))
        {
          $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
          $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    /******
     * Records new users online
     * @return 
     * @param object $t_added
     * @param object $identify[optional]
     * @param object $location[optional]
     */
    
    public function userRecorder($t_added, $identify=false, $location=false)
    {
        global $db;
        
        //lets begin by some sanitization
        $t_added = intval($t_added);
        
        $this->user = htmlspecialchars($identify);
        $location   = strip_tags($location);
        
        //grab the IP Address
        $this->ip   = $this->ipGrabber();
        
        //do some checking
        
        if($this->user == false)
        {
            //the user is a guest
            $this->user = "Guest";
        }
        
        if($location == false)
        {
            //no location specified
            $this->page = "N/A";
        }
        
        //before we send the user as a new one, lets check if we have him/her in the db already
        $query = db_query("SELECT oid FROM online WHERE ip='$this->ip'");
        
        if(db_num_rows($query) < 1)
        {
            //now enter it into the database
            db_query("INSERT INTO online (user,page,time,ip)VALUES('$this->user','$location','$t_added','$this->ip')");
        }
        
        else
        {
            //looks like the user is in the database, we should just update the time and location, or, just remove it and re-add it - That's a better idea =P
            db_query("DELETE FROM online WHERE ip='$this->ip'");
            
            //now enter it into the database
            db_query("INSERT INTO online (user,page,time,ip)VALUES('$this->user','$location','$t_added','$this->ip')");
            
        }
        
        //run the record remover
        $this->recordRemover();
    }
    
    /******
     * Removes people who are past due (who are offline)
     * @return 
     * @param object $ip[optional]
     */
    
    public function recordRemover($ip=false)
    {
        global $db;
        
        //set the vars
        $this->ip   = $ip;

        
        //for flexibilities sake, check if the ip is false
        if($this->ip == false)
        {
            //just remove whatever expired
            
            //lets select all records
            $query = db_query("SELECT ip, time FROM online");
            
            // no need to check if it returns results, chances are, when this script runs
            // someone will be online
            
            while($row = db_fetch_assoc($query))
            {
                $db_time = intval($row['time']);
                $db_ip   = htmlspecialchars($row['ip']);
                
                //add the time until offline to this time
                $db_time = $db_time + $this->time;
                
                // now time to compare it with now
                if(time() > $db_time)
                {
                    // It's Time Sire
                    // In other words, seems like its time to give them the boot
                    
                    db_query("DELETE FROM online WHERE ip='$db_ip'");
                }
            }
            
        }
        
        else
        {
            //looks like we need to remove the record based on the IP provided
            db_query("DELETE FROM online WHERE ip='$this->ip'");
        }
    }
    
    /******
     * Displays the full WOL List
     * @return 
     */
    
    public function displayWOL()
    {
        global $db, $total_guests, $total_users, $user, $page, $time,$onlinepath;
        
        //perform a select query
        
        //count the total guests online
        $query        = db_query("SELECT * FROM online WHERE user='Guest'");
        
        $total_guests = db_num_rows($query);
        
        //count the total users online
        $query2       = db_query("SELECT * FROM online WHERE user !='Guest'");
        
        $total_users  = db_num_rows($query2);
        
        //select everyone
        $query3       = db_query("SELECT * FROM online");
        
        include($onlinepath."templates/table_header.tpl");
        
        while($row = db_fetch_assoc($query3))
        {
            $user = htmlspecialchars($row['user']);
            $page = htmlspecialchars($row['page']);
            $time = relativeTime($row['time']);
            
            include($onlinepath."templates/table_body.tpl");
        }
        
        include($onlinepath."templates/table_footer.tpl");
        
    }
    
    /******
     * Displays a minimized WOL
     * @return 
     */
    
    public function minimized()
    {
        global $db, $total_guests, $total_users,$onlinepath;
        
        //perform a select query
        
        //count the total guests online
        $query        = db_query("SELECT * FROM online WHERE user='Guest'");
        
        $total_guests = db_num_rows($query);
        
        //count the total users online
        $query2       = db_query("SELECT * FROM online WHERE user !='Guest'");
        
        $total_users  = db_num_rows($query2);
        
        //grab template
        
        include($onlinepath."templates/minimized.tpl");
        
    }
}
