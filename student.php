<? // Student MODEL
class student {

/******************
 * Attributes     *
 ******************/
	var $_ID;
	var $_alive;

	
/***************************************************************************
 * CRUD METHODS															   														 *
 * For handling all (c)reate, (r)ead, (u)pdate and (d)elete) functionality *
 ***************************************************************************/
	 
/******************
 * CREATE METHODS *
 ******************/
 
	/**
	 * Constructor
	 *
	 * Creates a new student object, storing the students id, and 
	 * determine if the student exist already in the database.
	 *
	 * @param: (integer) ($id) - The students int(6) student_id from the MySQL DB. 
	 * @usage: $s = new student('pass student id');
	 */
	function student ($id) {
		
		$r = $mysqli->query("SELECT * FROM students WHERE student_id = ".$id." LIMIT 1") or die( $mysqli->error );
		$num_rows = $r->num_rows;
		
		// Set attributes
		$this->_ID = $id;
		$this->_alive = ($num_rows == 1) ? true : false;
		
	}	
	
	
	
/******************
 * READ METHODS   *
 ******************/
/* Usage example: echo $s->methodName(); */
 
	/**
	 * myID() - Gets the student's current student_id.
	 *
	 * @return: (integer) _ID - Student's ID.
	 * @usage: echo $s->myID();
	 */   
	function myID () {
		return $this->_ID;
	}
	
	/**
	 * myFirstName() - Gets the student's first_name from DB.
	 *
	 * @return: (string) $row['first_name'] - Student's first name.
	 * or (NULL).
	 * @usage: echo $s->myFirstName();
	 */
	function myFirstName () {
		
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT first_name FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$row = $r->fetch_array(MYSQLI_ASSOC);
			return $row['first_name'];
		else:
			return NULL;
		endif;
	}
	
	/**
	 * myLastName() - Gets the student's last_name from DB.
	 *
	 * @return: (string) $row['last_name'] - Student's last name.
	 * or (NULL).
	 * @usage: echo $s->myLastName();
	 */
	function myLastName () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT last_name FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$row = $r->fetch_array(MYSQLI_ASSOC);
			return $row['last_name'];
		else:
			return NULL;
		endif;
	}
	
	/**
	 * myGender() - Gets the student's gender from DB.
	 *
	 * @return: (char) $row['gender'] - Student's gender.
	 * or (NULL).
	 * @usage: echo $s->myGender();
	 */
	function myGender () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT gender FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$row = $r->fetch_array(MYSQLI_ASSOC);
			return $row['gender'];
		else:
			return NULL;
		endif;
	}
	
	/**
	 * iExist() - Used to check whether the student exist in the DB.
	 *
	 * @return: (boolean) _alive - true or false if student exist or not.
	 * @usage: echo ($s->iExist()) ? "I'M ALIVE ^_^" : "I ZOMBIE o_O";
	 */
	function iExist (){
		return $this->_alive;
	}
	
	/**
	 * myTeacherID() - Gets the student's user_id, i.e.,teacher id, from DB.
	 *
	 * @return: (integer) $row['user_id'] - Student's teacher ID.
	 * or (NULL).
	 * @usage: echo $s->myTeacherID();
	 */
	function myTeacherID () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT user_id FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$row = $r->fetch_array(MYSQLI_ASSOC);
			return $row['user_id'];
		else:
			return NULL;
		endif;
	}
	
	/**
	 * myInstitutionID() - Gets the student's institution_id from DB.
	 *
	 * @return: (integer) $row['institution_id'] - Student's institution id.
	 * or (NULL).
	 * @usage: echo $s->myInstitutionID();
	 */
	function myInstitutionID () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT institution_id FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$row = $r->fetch_array(MYSQLI_ASSOC);
			return $row['institution_id'];
		else:
			return NULL;
		endif;
	}
	
	/**
	 * myActiveStatus() - Gets the student's active status from DB.
	 *
	 * @return: (integer) $row['active'] - 0: inactive, 1: active.
	 * or (NULL).
	 * @usage: echo $s->myActiveStatus();
	 */
	function myActiveStatus () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT active FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$row = $r->fetch_array(MYSQLI_ASSOC);
			return $row['active'];
		else:
			return NULL;
		endif;
	}
	
	/**
	 * myBirthday() - Gets the student's birthday from DB.
	 *
	 * @return: (datetime string) $row['dob'] - Student's birthday.
	 * or (NULL).
	 * @usage: echo $s->myBirthday();
	 */
	function myBirthday () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT dob FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$row = $r->fetch_array(MYSQLI_ASSOC);
			return $row['dob'];
		else:
			return NULL;
		endif;
	}
	
	/**
	 * myLocation() - Gets the student's current location in online course.
	 *
	 * @return: (string) $row['location'] - Student's current location in the course.
	 * or (NULL).
	 * @usage: echo $s->myLocation();
	 */
	function myLocation () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT location FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$row = $r->fetch_array(MYSQLI_ASSOC);
			return $row['location'];
		else:
			return NULL;
		endif;
	}
	/**
	 * myGradeLevel() - Gets the student's grade from DB.
	 *
	 * @return: (integer) $row['grade'] - Student's grade.
	 * or (NULL).
	 * @usage: echo $s->myGradeLevel();
	 */
	function myGradeLevel () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT grade FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$row = $r->fetch_array(MYSQLI_ASSOC);
			return $row['grade'];
		else:
			return NULL;
		endif;
	}
	
	/**
	 * myLanguage() - Gets the student's instructional language from DB.
	 *
	 * @return: (string) $row['language'] - Student's instructional language.
	 * or (NULL).
	 * @usage: echo $s->myLanguage();
	 */
	function myLanguage () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT language FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$row = $r->fetch_array(MYSQLI_ASSOC);
			return $row['language'];
		else:
			return NULL;
		endif;
	}
	
	/**
	 * myStudentLoginPin() - Gets the student's access_pin from DB.
	 *
	 * @return: (string) $row['access_pin'] - Student's access pin.
	 * or (NULL).
	 * @usage: echo $s->myStudentLoginPin();
	 */
	function myStudentLoginPin () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT access_pin FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$row = $r->fetch_array(MYSQLI_ASSOC);
			return $row['access_pin'];
		else:
			return NULL;
		endif;
	}
	
	/**
	 * myActiveModDate() - Gets the student's last datetime stamp from DB
	 * for a change in their active status.
	 *
	 * @return: (datetime string) $row['active_mod_date'].
	 * or (NULL).
	 * @usage: echo $s->myActiveModDate();
	 */
	function myActiveModDate () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT active_mod_date FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$row = $r->fetch_array(MYSQLI_ASSOC);
			return $row['active_mod_date'];
		else:
			return NULL;
		endif;
	}
	
	/**
	 * my DaysLeftInHomeTrial() - Gets the remain days left in trial DB.
	 *
	 * @return: (integer) $row['days_left'] - Days remaining in trial.
	 * or (NULL).
	 * @usage: echo $s->myDaysLeftInHomeTrial();
	 */
	function myDaysLeftInHomeTrial () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT days_left FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$row = $r->fetch_array(MYSQLI_ASSOC);
			return $row['days_left'];
		else:
			return NULL;
		endif;
	}
	
	/**
	 * inTrialPeriod() - Returns whether student is in trial or not.
	 *
	 * @return: (boolean) $row['trial'] - 0: not in trial, 1: in trial.
	 * or (NULL).
	 * @usage: echo $s->inTrialPeriod();
	 */
	function inTrialPeriod () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT trial FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$student = $r->fetch_array(MYSQLI_ASSOC);
			return ($student['trial'] > 0) ? true : false;
		else:
			return NULL;
		endif;
	}
	
	/**
	 * myLastActivityDate() - Gets student's last datetime of activity in the course.
	 *
	 * @return: (datetime string) $row['last_activity_date'].
	 * or (NULL).
	 * @usage: echo $s->myLastActivityDate();
	 */
	function myLastActivityDate () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT last_activity_date FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$row = $r->fetch_array(MYSQLI_ASSOC);
			return $row['last_activity_date'];
		else:
			return NULL;
		endif;
	}
	
	/**
	 * myTotalTimeOnTask() - Gets student's time on task in the course.
	 *
	 * @return: (unix timestamp) $row['total_time_on_task'].
	 * or (NULL).
	 * @usage: echo $s->myTotalTimeOnTask();
	 */
	function myTotalTimeOnTask () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT total_time_on_task FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$row = $r->fetch_array(MYSQLI_ASSOC);
			return $row['total_time_on_task'];
		else:
			return NULL;
		endif;
	}
	
	/**
	 * hasHistory() - Returns if the student has recorded history in course.
	 *
	 * @return: (boolean) true, false, or (NULL).
	 * @usage: echo $s->hasHistory();
	 */
	function hasHistory () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT * FROM history WHERE student_id = ".$this->myID()) or die( $mysqli->error );
			$num_rows = $r->num_rows;
			return ($num_rows > 0) ? true : false;
		else:
			return NULL;
		endif;
	}

	/**
	 * hasStudentLoginAccess() - Returns whether the student has access to login
	 * without teacher intervention.
	 *
	 * @return: (boolean) true, false, or (NULL).
	 * @usage: echo $s->hasStudentLoginAccess();
	 */
	function hasStudentLoginAccess () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT after_school FROM students WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
			$student = $r->fetch_array(MYSQLI_ASSOC);
			return ($student['after_school'] > 0) ? true : false;
		else:
			return NULL;
		endif;
	}

/******************
 * UPDATE METHODS *
 ******************/
 // Usage example: echo $s->methodName();
 
 /**
	 * updateFirstName() - Updates the students first_name in MySQL DB
	 *
	 * @param: (string) ($fname) - New student first name.
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateFirstName ($fname) {
		if ($this->iExist()) :
			return $mysqli->query("UPDATE students SET first_name = '$fname' WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/**
	 * updateLastName() - Updates the students last_name in MySQL DB
	 *
	 * @param: (string) ($lname) - New student last name.
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateLastName ($lname) {
		if ($this->iExist()) :
			return $mysqli->query("UPDATE students SET last_name = '$lname' WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/**
	 * updateInstitutionID() - Updates the students institution_id in MySQL DB
	 *
	 * @param: (integer) ($id) - New student institution_id.
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateInstitutionID ($id) {
		if ($this->iExist()) :
			return $mysqli->query("UPDATE students SET institution_id = '$id' WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/**
	 * updateTeacherID() - Updates the students user_id in MySQL DB
	 *
	 * @param: (string) ($id) - New student teacher id.
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateTeacherID ($id) {
		if ($this->iExist()) :
			return $mysqli->query("UPDATE students SET user_id = '$id' WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/**
	 * updateGender() - Updates the students gender in MySQL DB
	 *
	 * @param: (char) ($gender) - New student gender. M - male, F - female.
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateGender ($gender) {
		if ($this->iExist()) :
			return $mysqli->query("UPDATE students SET gender = '$gender' WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/**
	 * updateBirthday() - Updates the students date of birth in MySQL DB
	 *
	 * @param: (date string) ($date) - New student birthday.
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateBirthday ($date) { // $date format = 'YYYY-MM-DD'
		if ($this->iExist()) :
			return $mysqli->query("UPDATE students SET dob = '$date' WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/**
	 * updateLocation() - Updates the students location in the course.
	 *
	 * @param: (string) ($loc) - New student location in the course.
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateLocation ($loc) {
		if ($this->iExist()) :
			return $mysqli->query("UPDATE students SET location = '$loc' WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/**
	 * updateGradeLevel() - Updates the students grade in school in MySQL DB
	 *
	 * @param: (integer) ($grade) - New student grade in school.
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateGradeLevel ($grade) {
		if ($this->iExist()) :
			return $mysqli->query("UPDATE students SET grade = '$grade' WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/**
	 * updateLanguage() - Updates the students instructional language in MySQL DB
	 *
	 * @param: (string) ($lang) - New student instructional language.
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateLanguage ($lang) {
		if ($this->iExist()) :
			return $mysqli->query("UPDATE students SET language = '$lang' WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/**
	 * updateStudentLoginPin() - Updates the students access_pin in MySQL DB
	 *
	 * @param: (string) ($pin) - New student access_pin.
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateStudentLoginPin ($pin) {
		if ($this->iExist()) :
			return $mysqli->query("UPDATE students access_pin = '$pin' WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/**
	 * updateActiveStatus() - Updates the students active status in MySQL DB
	 *
	 * @param: (integer) ($status) - 0: inactive, 1: active.
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateActiveStatus ($status) {
		if ($this->iExist()) :
			return $mysqli->query("UPDATE students SET active = '$status' WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/**
	 * updateActiveModDate() - Update timestamp for the lastest modification to 
	 * students active status in MySQL DB
	 *
	 * @param: (datetime string) ($datetime) - format 'YYYY-MM-DD HH:MM:SS'.
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateActiveModDate ($datetime="auto") { // $datetime format = 'YYYY-MM-DD HH:MM:SS'
		if ($this->iExist()) :
			if ($datetime=="auto") $datetime = date('Y-m-d h:i:s');
			return $mysqli->query("UPDATE students SET active_mod_date = '$datetime' WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/**
	 * updateDaysLeftInTrial() - Update days_left for student for trial in MySQL DB
	 *
	 * @param: (integer) ($numLeft)
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateDaysLeftInTrial ($numLeft) {
		if ($this->iExist()) :
			return $mysqli->query("UPDATE students SET days_left = '$numLeft' WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/**
	 * updateTrialStatus() - Update if student is in a trial or not.
	 *
	 * @param: (boolean) ($bool) - 0: not in trial, 1: in trial.
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateHomeTrialStatus ($bool) {
		if ($this->iExist()) :
			return $mysqli->query("UPDATE students SET trial = '$bool' WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/**
	 * updateLastActivityDate() - Update timestamp for the lastest modification to 
	 * students activity in the course.
	 *
	 * @param: (datetime string) ($datetime) - format 'YYYY-MM-DD HH:MM:SS'.
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateLastActivityDate ($datetime = "auto") { // $datetime format = 'YYYY-MM-DD HH:MM:SS'
		if ($this->iExist()) :
			if ($datetime=="auto") $datetime = date('Y-m-d h:i:s');
			return $mysqli->query("UPDATE students SET last_activity_date = '$datetime' WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/**
	 * updateTotalTimeOnTask() - Update total time in the course for the student.
	 *
	 * @param: (milliseconds) ($time)
	 * @return: (boolean) true or false if update worked. NULL if student doen't exist.
	 */
	function updateTotalTimeOnTask ($time) {
		if ($this->iExist()) :
			return $mysqli->query("UPDATE students SET total_time_on_task = (total_time_on_task+'$time') WHERE student_id = ".$this->myID()." LIMIT 1") or die ( $mysqli->error );
		else:
			return NULL;
		endif;
	}
 
 
 
/******************
 * DELETE METHODS *
 ******************/
 // Usage example: echo $s->methodName();
 
 	/* ERASE STUDENT FROM EXISTENCE !!! */
	function deleteMe () {
		if ($this->iExist()) :
			/* Erase all my data instances from history */
			$this->deleteBookmark();
			$this->deleteHistory();
			$this->deleteStudentNotes();
			$this->deleteStudentSubgroupData();
			$this->deleteSEOTransactions();
			$this->deleteCancellationComments();
			
			/* Now delete me :( bye bye sweet world */
			$r = $mysqli->query("DELETE FROM students WHERE student_id = ".$this->myID()." LIMIT 1")  or die( $mysqli->error );

		else:
			return NULL;
		endif;
	}
	
	/* Delete Bookmarks!!! */
	function deleteBookmark () {
		if ($this->iExist()) :
			$r = $mysqli->query("DELETE FROM bookmarks WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/* Delete History!!! */
	function deleteHistory () {
		if ($this->iExist()) :
			$r = $mysqli->query("SELECT history_id FROM _history WHERE student_id = ".$this->myID()) or die( $mysqli->error );
			
			while($history = mysql_fetch_array($r, MYSQL_ASSOC)) {
				
				/* Delete reading comprehension results */
				$r2 = $mysqli->query("DELETE FROM rcomp_results WHERE history_id = ".$history['history_id']) or die( $mysqli->error );
				
				/* Delete test scores */
				$r2 = $mysqli->query("DELETE FROM test_scores WHERE history_id = ".$history['history_id']) or die( $mysqli->error );
			}
			
			$r = $mysqli->query("DELETE FROM history WHERE student_id = ".$this->myID()) or die( $mysqli->error );
		else:
			return NULL;
		endif;
	}

	/* Delete Student Notes!!! */
	function deleteStudentNotes () {
		if ($this->iExist()) :
			$r = $mysqli->query("DELETE FROM student_notes WHERE student_id = ".$this->myID()) or die( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/* Delete Subgroup Data!!! */
	function deleteStudentSubgroupData () {
		if ($this->iExist()) :
			$r = $mysqli->query("DELETE FROM student_subgroup_data WHERE student_id = ".$this->myID()." LIMIT 1") or die( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/* Delete SEO Transaction if a home account user!!! */
	function deleteSEOTransactions () {
		if ($this->homeUser()) :
			$r = $mysqli->query("DELETE FROM transactions WHERE student_id = ".$this->myID()." AND user_id = ".$this->myTeacherID()." LIMIT 1") or die( $mysqli->error );
		else:
			return NULL;
		endif;
	}
	
	/* Delete cancellation comments!!! */
	function deleteCancellationComments () {
		if ($this->iExist()) :
			$r = $mysqli->query("DELETE FROM cancellation_comments WHERE student_id = ".$this->myID()) or die( $mysqli->error );
		else:
			return NULL;
		endif;
	}

}
?>