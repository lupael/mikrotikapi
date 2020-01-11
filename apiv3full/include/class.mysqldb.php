<?php
	error_reporting(0);
	class mysqldb {
			var $link;
			var $result;
		function connect($config) {
			$this->link = mysql_connect($config['hostname'], $config['username'], $config['password']);
			if($this->link) {
				mysql_query("SET NAMES 'utf-8'");
				return true;
			}
			$this->show_error(mysql_error($this->link), "connect()");
			return false;
		}
		function selectdb($database) {
			if($this->link) {
				mysql_select_db($database, $this->link);
				return true;
			}
			$this->show_error("Not connect the database before", "selectdb($database)");
			return false;
		}
		function query($sql) {
			$this->query = mysql_query($sql);
			return $this->query;
		}
		function fetch() {
			$result = mysql_fetch_object($this->query);
			return $result;
		}
		function num_rows() {
			return mysql_num_rows($this->query); 
		}
		function show_error($errmsg, $func) {
			echo "<b><font color=red>" . $func . "</font></b> : " . $errmsg . "<BR>\n";
			exit(1);
		} 
	}

?>
