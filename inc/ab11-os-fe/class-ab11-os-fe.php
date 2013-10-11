<?php

class AB11_OS_FE {
	private	$wpdb,
						$ab11_os_semester_db,
						$ab11_os_published_semesters,
						$prefix,
						$subjects,
						$subject_map,
						$rendered_subjects,
						$career,
						$courses,
						$rendered_courses,
						$semester_id,
						$calendar,
						$breadcrumbs,
						$queries,
						$filters;

	protected  $instance = NULL;

	private  $slug = 'ab11-os-fe';

	protected  $version = '1.1.0';

	public function __construct( $args ) {
		// $args = $_POST;
		$this->semester_id = isset( $args['semester_id'] ) ? $args['semester_id'] : NULL;
		$this->career = isset( $args['career'] ) ? $args['career'] : NULL;

		global $wpdb;
		$this->wpdb = $wpdb;

		$this->prefix = $this->wpdb->base_prefix . 'ab11_os_';
		$this->ab11_os_semester_db = $this->prefix;

		$this->subject_map = [
		'ALL' => 'All Subjects',
		'ACC' => 'Accounting',
		'ADJ' => 'Administration of Justice',
		'AGR' => 'Agriculture',
		'AIR' => 'Air Conditioning and Refrigeration',
		'ARC' => 'Architecture',
		'ART' => 'Art',
		'ASL' => 'American Sign Language',
		'AST' => 'Administrative Support Technology',
		'BIO' => 'Biology',
		'BLD' => 'Building',
		'BUS' => 'Business Management and Administration',
		'CAD' => 'Computer Aided Drafting and Design',
		'CHD' => 'Child Care',
		'CHI' => 'Chinese',
		'CHM' => 'Chemistry',
		'CST' => 'Communication Studies and Theatre',
		'CSC' => 'Computer Science',
		'SCS' => 'Computer Science',
		'DRF' => 'Drafting',
		'ECO' => 'Economics',
		'EDU' => 'Education',
		'ELE' => 'Electrical Technology',
		'ETR' => 'Electronics Technology',
		'EGR' => 'Engineering',
		'EMS' => 'Emergency Medical Services',
		'EMT' => 'Emergency Medical Technology',
		'ENF' => 'English Fundamentals',
		'ENG' => 'English',
		'ENV' => 'Environmental Science',
		'ESL' => 'English as a Second Language',
		'FIN' => 'Financial Services',
		'FRE' => 'French',
		'FST' => 'Fire Science Technology',
		'GEO' => 'Geography',
		'GER' => 'German',
		'GIS' => 'Geograph Info Systems',
		'GOL' => 'Geology',
		'HLT' => 'Health',
		'HIM' => 'Health Information Management',
		'HIS' => 'History',
		'HMS' => 'Human Services',
		'HRI' => 'Hotel-Restaurant-Institutional Management',
		'HRT' => 'Horticulture',
		'HUM' => 'Humanities',
		'IND' => 'Industrial Engineering Technology',
		'ITD' => 'Information Technology Database Processing',
		'ITE' => 'Information Technology Essentials',
		'ITN' => 'Information Technology Networking',
		'ITP' => 'Information Technology Programming',
		'JPN' => 'Japanese',
		'LGL' => 'Legal Administration',
		'MAC' => 'Machine Technology',
		'MAR' => 'Marine Science',
		'MDA' => 'Medical Assisting',
		'MDL' => 'Medical Laboratory',
		'MEC' => 'Mechanical Engineering Technology',
		'MEN' => 'Mental Health',
		'MKT' => 'Marketing',
		'MTH' => 'Math',
		'MTT' => 'Math Taught Through Technology',
		'MUS' => 'Music',
		'NAS' => 'Natural Science',
		'NUR' => 'Nursing',
		'PBS' => 'Public Service',
		'PED' => 'Physical Education and Recreation',
		'PHI' => 'Philosophy',
		'PHT' => 'Photography',
		'PHY' => 'Physics',
		'PLS' => 'Political Science',
		'PNE' => 'Practical Nursing',
		'PPT' => 'Pulp and Paper Technology',
		'PSY' => 'Psychology',
		'REA' => 'Real Estate',
		'REL' => 'Religion',
		'RUS' => 'Russian',
		'SCM' => 'Sign Communications',
		'SDV' => 'Student Development',
		'SOC' => 'Sociology',
		'SPA' => 'Spanish',
		'SPD' => 'Speech and Drama',
		'SSC' => 'Social Science',
		'TEL' => 'Telecommunications Management',
		'TRV' => 'Travel and Tourism',
		'VEN' => 'Viticulture and Enology',
		'WEL' => 'Welding',
		'ACCT' => 'Accounting and Bookkeeping',
		'ACQU' => 'Acquisition and Procurement',
		'AGNR' => 'Agriculture & Natural Resources',
		'BUSC' => 'Business, Professional Development, and Management',
		'COMM' => 'Communications',
		'FINL' => 'Financial Services, Banking, Credit',
		'ITEC' => 'Information Technology',
		'CHLD' => 'Childhood Development',
		'COSM' => 'Cosmetology',
		'DENT' => 'Dental',
		'EDUC' => 'Education',
		'EMTS' => 'Emergency Medical Technology',
		'ENGR' => 'Engineering',
		'FIRE' => 'Fire & Rescue Services',
		'HLTH' => 'Health Sciences and Safety',
		'HORT' => 'Horticulture',
		'HOST' => 'Hospitality, Culinary Arts, Travel & Tourism',
		'INSR' => 'Insurance Occupations',
		'LAWS' => 'Law, Criminal Justice, Paralegal, and Security',
		'MRTM' => 'Maritime Occupational Training',
		'MILT' => 'Military Training Programs',
		'REAL' => 'Real Estate',
		'TRNS' => 'Transportation',
		'ARTS' => 'Arts and Design',
		'MUSC' => 'Music',
		'PHTG' => 'Photography',
		'MANF' => 'Manufacturing & Industrial Occupations',
		'AERO' => 'Aviation',
		'AUTO' => 'Automotive Mechanics and Auto Body Repair',
		'CADD' => 'Computer Aided Drafting and Design',
		'BLDG' => 'Building and Construction Technologies',
		'ELEC' => 'Electrical/Electronic Technology',
		'HVAC' => 'Heating, Ventilation and Air Conditioning',
		'HVEQ' => 'Heavy Equipment Technology',
		'MINE' => 'Mining',
		'PLMB' => 'Plumbing and Pipefitting',
		'SHIP' => 'Maritime Ship Building & Repair',
		'WELD' => 'Welding',
		'WOOD' => 'Woodworking',
		'BIOL' => 'Biological Sciences',
		'CHEM' => 'Chemistry',
		'ENVR' => 'Environmental Science',
		'HIST' => 'History',
		'INTE' => 'Interdisciplinary Studies',
		'NATU' => 'Natural Science Technologies',
		'MATH' => 'Mathematics',
		'PHIL' => 'Philosophy',
		'PHSC' => 'Physical Science',
		'PSYC' => 'Psychology',
		'SOSC' => 'Social Sciences',
		'RELG' => 'Religion',
		'VETR' => 'Veterinary Studies',
		'LANG' => 'Languages',
		'AMSL' => 'American Sign Language',
		'ARAB' => 'Arabic',
		'CHIN' => 'Chinese',
		'ESLA' => 'English As A Second Language',
		'FREN' => 'French',
		'GERM' => 'German',
		'ITAL' => 'Italian',
		'JAPN' => 'Japanese',
		'RUSS' => 'Russian',
		'PORT' => 'Portuguese',
		'SPAN' => 'Spanish',
		'THAI' => 'Thai',
		'VIET' => 'Vietnamese',
		'WKEY' => 'WorkKeys',
		'TEST' => 'Test Preparation',
		'RECR' => 'Recreation and Physical Education',
		'LLRN' => 'Life Long Learning',
		'KIDS' => 'Kids College'
		];

		if ( !is_null( $this->semester_id ) && !is_null( $this->career ) ){
			$this->ab11_os_semester_db .= $this->semester_id;
			$this->courses = $this->set_courses();
			$this->subjects = $this->set_subjects();
			$this->calendar = $this->set_calendar();
			$this->filters = [
				'subject' => NULL,
				'time' => NULL,
				'day' => NULL,
				'session' => NULL,
				'location' => NULL
			];
			$this->filters = isset( $args['filters'] ) ? $this->set_filters() : $this->filters;

			$this->render_breadcrumbs( 'semester' );
		}
	}

	public function test( ) {
		$args = $_POST;
		$output = [
		'SEMESTER_ID' => $this->semester_id,
		'CAREER' => $this->career,
		'SEMESTER_DB' => $this->ab11_os_semester_db,
		'SUBJECTS' => count( $this->subjects ),
		'COURSES' => count( $this->courses ),
		'QUERIES' => $this->queries,
		'CALENDAR' => isset( $this->calendar ) ? 'SET' : 'NULL',
		'_POST' => $args,
		'FILTERS' => $this->filters,
		'BREADCRUMBS' => $this->breadcrumbs
		];


		return var_dump( $output );
		die();
	}

	public function set_param( $args ){

		foreach ($args as $key => $value) {
			$this->$key = $value;
		}
	}

	private function set_semester() {
		$args = $_POST;

		$this->semester_id = isset( $args['semester_id'] ) ? $args['semester_id'] : NULL;
		$this->ab11_os_semester_db = $this->prefix . $this->semester_id;

	}

	private function set_career() {
		$args = $_POST;
		$this->career	=	isset( $args['career'] ) ? $args['career'] : 'CRED';
	}

	private function set_options() {
		$args = $_POST;

	}

	private function set_courses () {
		$query = "SELECT * FROM $this->ab11_os_semester_db WHERE career='$this->career'";
		$this->queries['set_courses'] = $query;

		$output = $this->wpdb->get_results( $query, ARRAY_A );

		return $output;
	}
	private function set_subjects() {
		$output = '';
		$subjects = [];
		foreach ($this->courses as $course ) {
				$subjects[] = $course['subject'];

		}
		$subjects = array_unique($subjects);
		// $output = $this->render_subjects( $subjects_unique );

		return $subjects;
	}

	private function set_calendar () {
		$chunks = str_split( $this->semester_id, 1 );
		$output = '';

		switch ($chunks[3]) {
			case '2':
				$page_id = 8;
		 		break;

		 	case '3':
				$page_id = 10;
		 		break;

		 	case '4':
		 		$page_id = 215;
		 		break;

		 	default:
		 		$page_id = 6; //defaults to Fall
		 		break;
		}
		$query = "SELECT * FROM " . $this->wpdb->posts . " WHERE id = $page_id";
		$this->queries['set_calendar'] = $query;

		$page = $this->wpdb->get_row( $query );

		$output = '<div id="container-calendar" class="grid-12 container-calendar">';

		$output .= $page->post_content;

		$output .= '</div>';

		apply_filters('the_content', $output);
		return $output;
	}

	private function set_filters () {
			$args = $_POST;
			// $filters	=	isset( $args['filters'] ) ? $args['filters'] : NULL;
			$filters = [];
			// $filters = wp_parse_args( $filters, $this->filters );
			foreach ($args as $key => $value) {
				if ( strpos( $key, 'filter-' ) !== FALSE ) {
					$filter = substr( $key, 7 );
					$filters[$filter] = $value;
				}
			}
			return $filters;
	}
	public function get_semester() {
		return var_dump( $this->semester_id );
		die();
	}

	public function get_subjects() {
		return $this->render_subjects( $this->subjects );
		die();
	}

	public function get_calendar() {
		return $this->calendar;
		die();
	}

	public function get_courses() {
		$args = isset( $_POST ) ? $_POST : [];
		$this->filters = $this->set_filters();

		$this->rendered_courses = '<ul id="ab11-os-class-list" class="ab11-os-class-list grid-12 small">';

		foreach ($this->courses as $course) {

			$filtered = $this->filter_course( $course, $this->filters );

			if(! is_null($filtered) ){
				$this->rendered_courses .= $this->render_course( $filtered );
			}
		}
		$this->rendered_courses .= '</ul><!--end course list ul-->';
		return $this->rendered_courses;
		die();
	}

	public function get_course_detail() {
		$args = isset( $_POST ) ? $_POST :  [];
		$output = '';
		foreach ($this->courses as $course) {
			if ( $course['course_number'] == $args['course_number'] ){
				$output = $this->render_course_detail( $course );
			}
		}
		return $output;
	}

	public function get_breadcrumbs( $state ){
		$this->breadcrumbs = '<p id="breadcrumbs" class="breadcrumbs breadcrumbs-schedule">';
		if (is_array( $state ) ){
			foreach ($state as $value ) {
				$this->breadcrumbs .= $this->render_breadcrumbs( $value );
			}
		}
		$this->breadcrumbs .= '</p>';
		return $this->breadcrumbs;
		die();
	}
	private function filter_course( $course, $filters ) {


		if ( strcmp($course['subject'], $this->filters['subject'] ) == 0 ){
			return $course;
		} elseif ( strcmp( $this->filters['subject'], 'ALL' ) == 0 ){
			return $course;
		} else {
			return NULL;
		}
	}

	private function render_subjects( $subjects_unique ) {
		array_unshift( $subjects_unique, 'ALL');
		$create_four = ceil( count( $subjects_unique ) / 4 );
		$columns = ceil(count($subjects_unique) / $create_four);
		$i=0;
		$j=1;
		$output ='<div class="total-columns-' . $columns . ' col col-' . $j . '">';

		foreach($subjects_unique as $subject) {
			if ( $i < $create_four ) {

			} elseif ( $i == $create_four ) {
				$j++;
				$output .= '</div><div class="total-columns-' . $columns . ' col col-' . $j . '">';

				$i=0;
			} elseif ( $i > $create_four ) {
				$output .= '<li>Error processing subjects</li>';
			}
			$width = strlen( $this->subject_map[$subject] ) / 2;
			$output .= '<li><div class="is-hidden tooltip" style="width:' . $width . 'em;"><span>' . $this->subject_map[$subject] . '</span>';
			$output .= '</div><a href="#" class="select-subject" data-subject="' . $subject . '">' . $subject . '</a></li>';

			$i++;
		}

		$output .= '</div>';
		return $output;
	}

	private function render_course( $course ){
		$output ='';
		$c = $course;

		if (!is_null( $c ) ){
		$c['color'] = $this->render_color( $c['location'] );
		$output .= '<li class="course course-' . $c['status'] . ' ' . $c['color'] . '">';
			$output .= '<ul class="metadata">';
				$output .= '<li class="course-number">';
					$output .= $c['course_number'];
				$output .= '</li>';
				$output .= '<li class="course-title">';
					$output .= $c['subject'] . ' ' . $c['catalog'] . ' ' . $c['section'];
				$output .= '</li>';
				$output .= '<li class="course-long-title">';
					$output .= $c['long_title'];
				$output .= '</li>';
				$output .= '<li class="days">';
					$output .= $this->render_days( $c['days'] );
				$output .= '</li>';
				$output .= '<li class="time">';
					$output .= $this->render_time( $c );
				$output .= '</li>';
				$output .= '<li class="instructor">';
					$output .= $c['last_name'];
				$output .= '</li>';
				$output .= '<li class="length">';
					$output .= $this->render_length( $c );
				$output .= '</li>';
				$output .= '<li class="location">';
					$output .= $this->render_location( $c['location'] );;
				$output .= '</li>';
			$output .= '</ul>';
		$output .= '</li>';
		} elseif ( is_null( $c ) ) {
			// $output = 'NULL';
		}
		return $output;
	}

	private function render_days( $days ) {
		$days = (strcmp( $days, 'Online' ) == 0) ? 'Online' : str_split( $days, 1 );
		$defaults = ['M', 'T', 'W', 'R', 'F', 'S'];

		$output = '';

		if ( !is_array( $days ) ) {
			return $days;
		} else {
			foreach ($defaults as $day) {
				if ( in_array( $day, $days ) ){
					$output .= '<span class="day day-highlight">' . $day . '</span>';
				}	else {
					$output .= '<span class="day day-dimmed">' . $day . '</span>';
				}
			}
		}
		return $output;
	}

	private function render_time( $course ) {
		if ( empty( $course['start_time'] ) && empty( $course['end_time'] ) ) {
			$output = 'N/A';
		} elseif ( preg_match("/^: [A|P]M$/", $course['start_time'] ) ||
							 preg_match("/^: [A|P]M$/", $course['end_time'] ) ){
			$output = 'TBA';
		} else {
			$output = $course['start_time'] . ' - ' . $course['end_time'];
		}

		return $output;
	}

	private function render_length( $course ) {
		$output = '';

		if ( strcmp( $course['session'], 'DYN' ) == 0 ){
			$output .= 'Dynamic';
		} else {
			$weeks = preg_replace("/(\d*)([A-Z]*)(\d*)/", '$1', $course['session']);
			$output .= $weeks . 'W from ';
			$output .= $course['start_date'] . ' - ' . $course['end_date'];
		}

		return $output;
	}

	private function render_location( $location ) {
		return ( strcmp($location, 'Distance Learning' ) == 0 ) ? 'ONLINE' : $location;
	}

	private function render_color( $location ) {
		switch ( $location ) {
			case 'Distance Learning':
				$output = 'green10';
				break;
			case 'GLENNS':
				$output = 'blue10';
				break;
			case 'WARSAW':
				$output = 'rcc-green10';
				break;
			case 'KGEORGE':
				$output = 'orange10';
				break;
			case 'KILMARNOCK':
				$output = 'purple10';
				break;
			default:
				$output = 'white-grey';
				break;
		}
		return $output;
	}

	private function render_room( $room ){
		return ( empty($room )  ) ? 'N/A' : $room;

	}

	private function render_mode_description( $mode ){
		$output = $mode . ': ';
		switch ( $mode ) {
			case 'Interactive Classroom Video':
				$output .='Synchronous (at a specfic time) courses that are delivered at RCC via Interactive video. ';
				$output .= 'Interactive video courses are more like traditional courses. Class attendance ';
				$output .= 'is required; however, they are more flexible in that the students may attend ';
				$output .= 'the campus most convenient to them, Warsaw, Glenns, and occasionally other ';
				$output .= 'distant sites. Interactive Video classes are just that-students and faculty ';
				$output .= 'interact over high speed communication lines and televisions. These courses are ';
				$output .= 'found in the schedule with IV (Interactive Video). Interactive Video courses have ';
				$output .= 'orientation at the first class meeting. To identify these courses in the class ';
				$output .= 'schedule, look for the IV icon throughout the schedule with section number of 66-69 & 84.';
				break;
			case 'Online':
				$output .= 'Asynchronous (anytime) courses where the instructor and the students are separated not only by ';
				$output .= 'distance but often by time as well. Some Online courses are taught via the Internet ';
				$output .= 'through Blackboard an online course management tool and may make use of CDROM technology, ';
				$output .= 'videos, or computers in other ways to enhance or teach the course. These courses require ';
				$output .= 'proficiency in accessing the Internet and in sending/receiving e-mail including attachments. ';
				$output .= 'All courses require a minimum of two proctored tests at an RCC site and the use of e-mail as ';
				$output .= 'a communication tool. Students must either have Internet access at home or work or have ';
				$output .= 'access to RCC computers. Online courses are also found in the schedule with section number of 63-64.';
				break;
			case 'In Person':
				$output .= 'Synchronous (at a specific time) courses that are presented in traditional fashion. Typically ';
				$output .= 'meeting 1-5 times per week depending on the amount of credits the course is alloted.';
				break;
			case 'Hybrid':
				$output .= 'A blend of traditional and distance learning courses. “Hybrid” is the name commonly ';
				$output .= 'used nationwide to describe courses that combine face-to-face classroom instruction ';
				$output .= 'with course learning online. These courses will use a significant amount of time with ';
				$output .= 'course learning online and, as a result, reduce the amount of classroom seat time. Out ';
				$output .= 'of class time will be delivered through technology at the convenience of the student. ';
				$output .= 'Hybrid course are found in the schedule with the HYB icon. These courses require a first ';
				$output .= 'class meeting, where each instructor will give the specifics of when and how often they ';
				$output .= 'will meet on campus.';
				break;
			default:
				$output = $mode;
				break;
		}

		return $output;
	}

	private function render_bookstore ($course ){
		$storeid = (strcmp($course["location"],"WARSAW")==0||strcmp($course["location"],"KGEORGE")==0) ?
			3073 : 495;
		$url = 'http://www.bkstr.com/webapp/wcs/stores/servlet/booklookServlet%20?bookstore_id-1='.
			$storeid.'&term_id-1='.$this->semester_id.'&crn-1='.$course['course_number'];
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$contents = curl_exec($ch);
		curl_close($ch);
		$output = '';

		$output .= '';
		$output .= '<a href="' . $url . '"target="_blank">For more information and purchasing options, click here.</a><br />';

		$start = strpos($contents,'<h2 class="floatLeft paddingLeft1em">RESULTS FOR:</h2>');
		$filtered = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $contents);
		$filtered = preg_replace("/[\t\r\n]/", "" , $filtered);

		preg_match_all("/<h[2-3]>(.*?)<\/h[2-3]>/i", $filtered, $matched);
		foreach (array_slice($matched[0],3) as $value) {
			$temp = preg_replace( "/<h[2-3]>/", '<span>' ,$value );
			$temp = preg_replace( "/<\/h[2-3]>/", '</span><br />' ,$temp );
			$output .= $temp;
		}
		$output .= '</ul>';
		return $output;
	}
	private function render_breadcrumbs( $state ){
		$output = '';
		switch ( $state ) {
			case 'semester':
				$output .= '<span><a href="?function=get_semester&semester_id=' . $this->semester_id .
				'&career=' . $this->career . '">' . $this->decrypt_semester_id($this->semester_id) . '</a></span>';
				break;
			case 'calendar':
				$output .= '<span class="separator">»</span><span id="Calendar"><a href="?function=get_calendar' .
				'&semester_id=' . $this->semester_id . '&career=' . $this->career . '">Calendar</a></span>';
				break;
			case 'courses':
				$output .= '<span class="separator">»</span><span id="Courses"><a href="?function=get_courses' .
				'&semester_id=' . $this->semester_id . '&career=' . $this->career . '&filters=';

				foreach ($this->filters as $key => $value) {
					$output .= $key . ':' . $value . '|';
				}

				$output .= '">Courses</a></span>';
				break;
			default:
				# code...
				break;
		}

		return $output;
	}

	private function render_course_detail( $course ){
		$c = $course;


		$output = '<ul class="course-details">';
		$output .= '<li class="course-title"><span class="course-detail-label">' . 'Title: ' . '</span>';

			$output .= $c['subject'] . ' ' . $c['catalog'] . ' ' . $c['section'] . ' ' . $c['long_title'];
		$output .= '</li>';
		$output .= '<li class="status"><span class="course-detail-label">' . 'Status: ' . '</span>';

		$output .= $c['status'];

		$output .= '</li>';
				$output .= '<li class="course-number"><span class="course-detail-label">' . 'Course Number: ' . '</span>';

		$output .= $c['course_number'];

		$output .= '</li>';
				$output .= '<li class="days"><span class="course-detail-label">' . 'Days: ' . '</span>';

		$output .= $this->render_days( $c['days'] );

		$output .= '</li>';
				$output .= '<li class="time"><span class="course-detail-label">' . 'Time: ' . '</span>';

		$output .= $this->render_time( $c );

		$output .= '</li>';
				$output .= '<li class="instructor"><span class="course-detail-label">' . 'Instructor: ' . '</span>';

		$output .= $c['first_name'] . ' ' . $c['last_name'];

		$output .= '</li>';
				$output .= '<li class="session"><span class="course-detail-label">' . 'Session: ' . '</span>';

		$output .= $c['session'];

		$output .= '</li>';
				$output .= '<li class="room"><span class="course-detail-label">' . 'Room: ' . '</span>';

		$output .= $this->render_room( $c['room'] );

		$output .= '</li>';
				$output .= '<li class="credits"><span class="course-detail-label">' . 'Credits: ' . '</span>';

		$output .= $c['credits'];

		$output .= '</li>';
				$output .= '<li class="location"><span class="course-detail-label">' . 'Location: ' . '</span>';

		$output .= $this->render_location( $c['location'] );

		$output .= '</li>';
				$output .= '<li class="notes"><span class="course-detail-label">' . 'Notes: ' . '</span>';

		$output .= '<span class="long">' . $c['notes'] . '</span>';

		$output .= '</li>';
				$output .= '<li class="course-description"><span class="course-detail-label">' . 'Course Description: ' . '</span>';

		$output .= '<span class="long">' . $c['course_description'] . '</span>';

		$output .= '</li>';
				$output .= '<li class="mode-description"><span class="course-detail-label">' . 'Mode: ' . '</span>';

		$output .= '<span class="long">' . $this->render_mode_description( $c['mode_description'] ) . '</span>';

		$output .= '</li>';
				$output .= '<li class="seats"><span class="course-detail-label">' . 'Seats: ' . '</span>';

		$output .= $c['tot_enrl'] . ' / ' . $c['cap_enrl'];

		$output .= '</li>';
				$output .= '<li class="length"><span class="course-detail-label">' . 'Course Length: ' . '</span>';

		$output .= $this->render_length( $c );

		$output .= '</li>';
				$output .= '<li class="census-date"><span class="course-detail-label">' . 'census_date: ' . '</span>';

			$output .= $c['census_date'];
		$output .= '</li>';
				$output .= '<li class="withdraw-date"><span class="course-detail-label">' . 'Last day to Withdraw: ' . '</span>';

		$output .= $c['withdrawal_date'];

		$output .= '</li>';
				$output .= '<li class="bookstore"><span class="course-detail-label">' . 'Bookstore: ' . '</span>';

		$output .= '<span class="long">' . $this->render_bookstore( $c ) . '</span>';

		$output .= '</li>';
	$output .= '</ul>';

		return $output;
	}
	private function decrypt_semester_id( $semester_id ) {
	$chunks = str_split( $semester_id, 1 );
	$output = '';

	switch ($chunks[3]) {
	 	case '2':
		 	$output .= 'Spring 201' . $chunks[2];
	 		break;

	 	case '3':
		 	$output .= 'Summer 201' . $chunks[2];
	 		break;

	 	case '4':
		 	$output .= 'Fall 201' . $chunks[2];
	 		break;

	 	default:
	 		$output .= 'Semester 201' . $chunks[2];
	 		break;
	 }
	 return $output;
	}
}

?>