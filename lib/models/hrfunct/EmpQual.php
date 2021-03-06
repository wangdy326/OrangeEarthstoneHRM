<?php
/*
// OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures 
// all the essential functionalities required for any enterprise. 
// Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com

// OrangeHRM is free software; you can redistribute it and/or modify it under the terms of
// the GNU General Public License as published by the Free Software Foundation; either
// version 2 of the License, or (at your option) any later version.

// OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
// without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// See the GNU General Public License for more details.

// You should have received a copy of the GNU General Public License along with this program;
// if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
// Boston, MA  02110-1301, USA
*/

require_once ROOT_PATH . '/lib/confs/Conf.php';
require_once ROOT_PATH . '/lib/dao/DMLFunctions.php';
require_once ROOT_PATH . '/lib/dao/SQLQBuilder.php';
require_once ROOT_PATH . '/lib/common/CommonFunctions.php';

class EmpQualification {

	var $tableName = 'HS_HR_EMP_QUALIFICATION';
	
	var $empId;
	var $empQualId;
	var $empQualInst;
	var $empQualYear;
	var $empQualStat;
	var $empQualComment;
	
	var $arrayDispList;
	var $singleField;

	function EmpQualification() {
		
	}
	
	function setEmpId($empId) {
	
	$this->empId=$empId;
	}
	
	function setEmpQualId($empQualId) {
	
	$this->empQualId=$empQualId;
	}
	
	function setEmpQualInst($empQualInst) {
	
	$this->empQualInst=$empQualInst;
	}
	
	function setEmpQualYear($empQualYear) {
	
	$this->empQualYear=$empQualYear;
	}
	
	function setEmpQualStat($empQualStat) {
	
	$this->empQualStat=$empQualStat;
	}
	
	function setEmpQualComment($empQualComment) {
	
	$this->empQualComment=$empQualComment;
	}
	
	function getEmpId() {
	
	return $this->empId;
	}
	
	function getEmpQualId() {
	
	return $this->empQualId;
	}
	
	function getEmpQualInst() {
	
	return $this->empQualInst;
	}
	
	function getEmpQualYear() {
	
	return $this->empQualYear;
	}
	
	function getEmpQualStat() {
	
	return $this->empQualStat;
	}
	
	function getEmpQualComment() {
	
	return $this->empQualComment;
	}
////
	
	function getListofEmpQual($page,$str,$mode) {
		
		$tableName = 'HS_HR_EMP_QUALIFICATION';

		$sql_builder = new SQLQBuilder();
		
		$sql_builder->table_name = $tableName;
		$sql_builder->flg_select = 'true';
		$sql_builder->field = 'EMP_NUMBER';
			
		$sqlQString = $sql_builder->selectEmployee($page,$str,$mode);
		
		//echo $sqlQString;		
		$dbConnection = new DMLFunctions();
		$message2 = $dbConnection -> executeQuery($sqlQString); //Calling the addData() function
		
		$i=0;
		
		 while ($line = mysql_fetch_array($message2, MYSQL_NUM)) {
		 	
	    	$arrayDispList[$i][0] = $line[0];
	    	$arrayDispList[$i][1] = $line[1];
	    	$i++;
	    	
	     }
	     
	     if (isset($arrayDispList)) {
	     
			return $arrayDispList;
			
		} else {
		
			$arrayDispList = '';
			return $arrayDispList;
			
		}
	}

	function countEmpQual($str,$mode) {
		
		$tableName = 'HS_HR_EMP_QUALIFICATION';

		$sql_builder = new SQLQBuilder();
		
		$sql_builder->table_name = $tableName;
		$sql_builder->flg_select = 'true';
		$sql_builder->field = 'EMP_NUMBER';
			
		$sqlQString = $sql_builder->countEmployee($str,$mode);
		
		//echo $sqlQString;		
		$dbConnection = new DMLFunctions();
		$message2 = $dbConnection -> executeQuery($sqlQString); //Calling the addData() function
		
		$line = mysql_fetch_array($message2, MYSQL_NUM);
		 	
	    	return $line[0];
	}

	function delEmpQual($arrList) {

		$tableName = 'HS_HR_EMP_QUALIFICATION';
		$arrFieldList[0] = 'EMP_NUMBER';
		$arrFieldList[1] = 'QUALIFI_CODE';

		$sql_builder = new SQLQBuilder();

		$sql_builder->table_name = $tableName;
		$sql_builder->flg_delete = 'true';
		$sql_builder->arr_delete = $arrFieldList;

		$sqlQString = $sql_builder->deleteRecord($arrList);

		//echo $sqlQString;
		$dbConnection = new DMLFunctions();
		$message2 = $dbConnection -> executeQuery($sqlQString); //Calling the addData() function

	}

	function addEmpQual() {
		
		$this->getEmpId();
		$arrFieldList[0] = "'". $this->getEmpQualId() . "'";
		$arrFieldList[1] = "'". $this->getEmpId() . "'";
		$arrFieldList[2] = "'". $this->getEmpQualInst() . "'";
		$arrFieldList[3] = "'". $this->getEmpQualYear() . "'";
		$arrFieldList[4] = "'". $this->getEmpQualStat() . "'";
		$arrFieldList[5] = "'". $this->getEmpQualComment() . "'";
		
		$tableName = 'HS_HR_EMP_QUALIFICATION';
	
		$sql_builder = new SQLQBuilder();
		
		$sql_builder->table_name = $tableName;
		$sql_builder->flg_insert = 'true';
		$sql_builder->arr_insert = $arrFieldList;		
			
	
		$sqlQString = $sql_builder->addNewRecordFeature1();
	
		$dbConnection = new DMLFunctions();
		$message2 = $dbConnection -> executeQuery($sqlQString); //Calling the addData() function
		
		 return $message2;
		 echo $message2;
				
	}
	
	function updateEmpQual() {
		
		$arrRecordsList[0] = "'". $this->getEmpQualId() . "'";
		$arrRecordsList[1] = "'". $this->getEmpId() . "'";
		$arrRecordsList[2] = "'". $this->getEmpQualInst() . "'";
		$arrRecordsList[3] = "'". $this->getEmpQualYear() . "'";
		$arrRecordsList[4] = "'". $this->getEmpQualStat() . "'";
		$arrRecordsList[5] = "'". $this->getEmpQualComment() . "'";

		$tableName = 'HS_HR_EMP_QUALIFICATION';
		$arrFieldList[0] = 'QUALIFI_CODE';
		$arrFieldList[1] = 'EMP_NUMBER';
		$arrFieldList[2] = 'EQUALIFI_INSTITUTE';
		$arrFieldList[3] = 'EQUALIFI_YEAR';
		$arrFieldList[4] = 'EQUALIFI_STATUS';
		$arrFieldList[5] = 'EQUALIFI_COMMENTS';

		$sql_builder = new SQLQBuilder();
		
		$sql_builder->table_name = $tableName;
		$sql_builder->flg_update = 'true';
		$sql_builder->arr_update = $arrFieldList;	
		$sql_builder->arr_updateRecList = $arrRecordsList;	
	
		$sqlQString = $sql_builder->addUpdateRecord1(1);
	
		$dbConnection = new DMLFunctions();
		$message2 = $dbConnection -> executeQuery($sqlQString); //Calling the addData() function
		
		return $message2;
		 
				
	}
	
	
	function filterEmpQual($getID) {
		
		$this->getID = $getID;

		$tableName = 'HS_HR_EMP_QUALIFICATION';
		$arrFieldList[0] = 'QUALIFI_CODE';
		$arrFieldList[1] = 'EMP_NUMBER';
		$arrFieldList[2] = 'EQUALIFI_INSTITUTE';
		$arrFieldList[3] = 'EQUALIFI_YEAR';
		$arrFieldList[4] = 'EQUALIFI_STATUS';
		$arrFieldList[5] = 'EQUALIFI_COMMENTS';

		$sql_builder = new SQLQBuilder();
		
		$sql_builder->table_name = $tableName;
		$sql_builder->flg_select = 'true';
		$sql_builder->arr_select = $arrFieldList;		
			
		$sqlQString = $sql_builder->selectOneRecordFiltered($this->getID,1);
		
		//echo $sqlQString;		
		$dbConnection = new DMLFunctions();
		$message2 = $dbConnection -> executeQuery($sqlQString); //Calling the addData() function
		
		$i=0;
		
		 while ($line = mysql_fetch_array($message2, MYSQL_NUM)) {
		 	
			for($c=0;count($arrFieldList)>$c;$c++)
			   $arrayDispList[$i][$c] = $line[$c];
	    	
	    	$i++;
	    	
	     }
	     
	     if (isset($arrayDispList)) {
	     
			return $arrayDispList;
			
		} else {
		
			$arrayDispList = '';
			return $arrayDispList;
			
		}
				
	}

	function getAssEmpQual($getID) {
		
		$this->getID = $getID;

		$tableName = 'HS_HR_EMP_QUALIFICATION';
		$arrFieldList[0] = 'EMP_NUMBER';
		$arrFieldList[1] = 'QUALIFI_CODE';
		$arrFieldList[2] = 'EQUALIFI_INSTITUTE';
		$arrFieldList[3] = 'EQUALIFI_YEAR';
		$arrFieldList[4] = 'EQUALIFI_STATUS';
		$arrFieldList[5] = 'EQUALIFI_COMMENTS';

		$sql_builder = new SQLQBuilder();
		
		$sql_builder->table_name = $tableName;
		$sql_builder->flg_select = 'true';
		$sql_builder->arr_select = $arrFieldList;		
			
		$sqlQString = $sql_builder->selectOneRecordFiltered($this->getID);
		
		echo $sqlQString;		
		$dbConnection = new DMLFunctions();
		$message2 = $dbConnection -> executeQuery($sqlQString); //Calling the addData() function
		
		$i=0;
		
		 while ($line = mysql_fetch_array($message2, MYSQL_NUM)) {
		 	
			for($c=0;count($arrFieldList)>$c;$c++)
			   $arrayDispList[$i][$c] = $line[$c];
	    	
	    	$i++;
	    	
	     }
	     
	     if (isset($arrayDispList)) {
	     
			return $arrayDispList;
			
		} else {
		
			$arrayDispList = '';
			return $arrayDispList;
			
		}
				
	}
	
	
}

?>
