<?php
//Change for PRODUCTION
//include_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );
// include_once($_SERVER['DOCUMENT_ROOT'].'www.wp.dev/wp-load.php' );
// include_once(get_bloginfo( 'template_directory' ).'/functions.php' );


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
						$queries;

	protected  $instance = NULL;

	private  $slug = 'ab11-os-fe';

	protected  $version = '1.1.0';

	public function __construct() {
		$args = $_POST;
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
		'POST' => $args
		];


		return var_dump( $output );
		die();
	}



	public function set_semester() {
		$args = $_POST;

		$this->semester_id = isset( $args['semester_id'] ) ? $args['semester_id'] : NULL;
		$this->ab11_os_semester_db = $this->prefix . $this->semester_id;

	}

	public function set_career() {
		$args = $_POST;
		$this->career	=	isset( $args['career'] ) ? $args['career'] : 'CRED';
	}

	public function set_options() {
		$args = $_POST;

	}

	public function set_courses () {
		$query = "SELECT * FROM $this->ab11_os_semester_db WHERE career='$this->career'";
		$this->queries['set_courses'] = $query;

		$output = $this->wpdb->get_results( $query, ARRAY_A );

		return $output;
	}
	public function set_subjects() {
		$output = '';
		$subjects = [];
		foreach ($this->courses as $course ) {
				$subjects[] = $course['subject'];

		}
		$subjects = array_unique($subjects);
		// $output = $this->render_subjects( $subjects_unique );

		return $subjects;
	}

	public function set_calendar () {
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
		 		$page_id = 105;
		 		break;

		 	default:
		 		$page_id = 6; //defaults to Fall
		 		break;
		}
		$query = "SELECT * FROM " . $this->wpdb->posts . " WHERE id = $page_id";
		$this->queries['set_calendar'] = $query;

		$page = $this->wpdb->get_row( $query );

		// $page = $this->wpdb->get_row("SELECT * FROM " . );
		$output = $page->post_content;
		apply_filters('the_content', $output);
		return $output;
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
		foreach ($this->courses as $course) {

			$filtered = $this->filter_course( $course, $args );

			$this->rendered_courses .= $this->render_course( $filtered );
		}

		return $this->rendered_courses;
		die();
	}

	public function get_course_detail() {
		$args = isset( $_POST ) ? $_POST :  [];
	}

	private function filter_course( $course, $args ) {
		$defaults = [
			'subject' => NULL
			];
		$args = wp_parse_args( $args['filters'], $defaults );

		if ( strcmp($course['subject'], $args['subject'] ) == 0 ){
			return $course;
		} elseif ( strcmp( $args['subject'], 'ALL' ) == 0 ){
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
					$output .= $c['subject'] . ' ' . $c['catalog'] . ' ' . $c['section'] . ' ' . $c['long_title'];
				$output .= '</li>';
				$output .= '<li class="days">';
					$output .= $this->render_days( $c['days'] );
				$output .= '</li>';
				$output .= '<li class="time">';
					$output .= $this->render_time( $c );
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

}

?>