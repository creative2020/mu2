<?php
/*
Plugin Name: Paddings
Description: Allows you to add padding times surrounding your appointment intervals.
Plugin URI: http://premium.wpmudev.org/project/appointments-plus/
Version: 1.0
AddonType: Schedule
Author: WPMU DEV
*/

class App_Schedule_Paddings {

	const PADDING_BEFORE = 'before';
	const PADDING_AFTER = 'after';

	const PADDING_TYPE_CUMULATIVE = 'cumulative';
	const PADDING_TYPE_LARGEST = 'largest';
	const PADDING_TYPE_SMALLEST = 'smallest';

	private $_data;
	private $_core;

	private $_allowed_paddings = array();
	private $_allowed_positions = array();

	private function __construct () {
		$this->_allowed_paddings = array(
			self::PADDING_TYPE_CUMULATIVE => __('Cumulative', 'appointments'),
			self::PADDING_TYPE_LARGEST => __('Largest', 'appointments'),
			self::PADDING_TYPE_SMALLEST => __('Smallest', 'appointments'),
		);
		$this->_allowed_positions = array(
			self::PADDING_BEFORE => __('Before', 'appointments'),
			self::PADDING_AFTER => __('After', 'appointments'),
		);
	}

	public static function serve () {
		$me = new App_Schedule_Paddings;
		$me->_add_hooks();
	}

	private function _add_hooks () {
		add_action('plugins_loaded', array($this, 'initialize'));

		//Apply padding to front-end timetable.
		add_filter('app-timetable-step_increment', array($this, 'apply_step_increment_padding'));
		//Apply padding to backend admin settings.
		add_filter('app_admin_min_time', array($this, 'apply_admin_min_time_padding'));

		// UI - resolution type
		add_action('app-settings-time_settings', array($this, 'show_settings'));
		add_filter('app-options-before_save', array($this, 'save_settings'));

		// Augment service settings pages
		add_filter('app-settings-services-service-name', array($this, 'add_service_selection'), 10, 2);
		add_action('app-services-service-updated', array($this, 'save_service_padding'));

		add_filter('app-settings-workers-worker-name', array($this, 'add_worker_selection'), 10, 2);
		add_action('app-workers-worker-updated', array($this, 'save_worker_padding'));
	}

	public function initialize () {
		global $appointments;
		$this->_core = $appointments;

		$schedule_padding = !empty($appointments->options['schedule_padding']) ? $appointments->options['schedule_padding'] : array();
		$services_padding = get_option('appointments_services_padding', array());
		$workers_padding = get_option('appointments_workers_padding', array());

		// Stubbing the model data
		$this->_data = array(
			'schedule_padding' => wp_parse_args($schedule_padding, array(
				'type' => self::PADDING_TYPE_LARGEST,
			)),
			'service_padding' => $services_padding,
			'worker_padding' => $workers_padding,
		);
	}

	public function save_settings ($options) {
		if (!empty($_POST['schedule_padding']) && in_array($_POST['schedule_padding'], array_keys($this->_allowed_paddings))) $options['schedule_padding'] = array('type' => $_POST['schedule_padding']);
		return $options;
	}

	public function show_settings () {
		$saved = !empty($this->_data['schedule_padding']['type']) && in_array($this->_data['schedule_padding']['type'], array_keys($this->_allowed_paddings))
			? $this->_data['schedule_padding']['type']
			: self::PADDING_TYPE_LARGEST
		;
		$type_help = array(
			self::PADDING_TYPE_SMALLEST => __('... applying the smaller padding of the two', 'appointments'),
			self::PADDING_TYPE_LARGEST => __('... applying the larger padding of the two', 'appointments'),
			self::PADDING_TYPE_CUMULATIVE => __('... adding the two together and applying the result', 'appointments'),
		);
		?>
<tr valign="top">
	<th scope="row"><?php _e('Padding resolution type', 'appointments'); ?></th>
	<td>
		<div><span class="description"><?php _e('When both the current service and the current service provider have paddings assigned, resolve them by...', 'appointments'); ?></span></div>
	<?php foreach ($this->_allowed_paddings as $padding => $name) { ?>
		<label for="app-padding-<?php echo esc_attr($padding); ?>">
			<input type="radio" id="app-padding-<?php echo esc_attr($padding); ?>" name="schedule_padding" value="<?php echo esc_attr($padding); ?>" <?php checked($saved, $padding); ?> />
			<?php echo $name; ?>
			<br />
			<span class="description"><?php echo $type_help[$padding]; ?></span>
		</label><br />
	<?php } ?>
	</td>
</tr>
		<?php
	}

	public function add_service_selection ($out, $service_id) {
		$paddings = !empty($this->_data['service_padding'][$service_id])
			? $this->_data['service_padding'][$service_id]
			: array(self::PADDING_BEFORE => 0, self::PADDING_AFTER => 0)
		;
		$range = range(0, 180, 5);
		$out .= '<div class="app-service_padding">';
		$out .= '<h4>' . __('Padding times', 'appointments') . '</h4>';
		$out .= '<label>';
		$out .= $this->_allowed_positions[self::PADDING_BEFORE] . "&nbsp;<select name='service_padding_before[{$service_id}]'>";
		foreach ($range as $value) {
			$selected = selected($paddings[self::PADDING_BEFORE], $value, false);
			$out .= "<option value='{$value}' {$selected}>{$value}</option>";
		}
		$out .= '</select>';
		$out .= '</label>';
		$out .= '<label>';
		$out .= $this->_allowed_positions[self::PADDING_AFTER] . "&nbsp;<select name='service_padding_after[{$service_id}]'>";
		foreach ($range as $value) {
			$selected = selected($paddings[self::PADDING_AFTER], $value, false);
			$out .= "<option value='{$value}' {$selected}>{$value}</option>";
		}
		$out .= '</select>';
		$out .= '</label>';
		$out .= '</div>';

		return strtr($out, "'", '"'); // We have to escape this, because of the way the JS injection works on the services page (wtf really o.0)
	}

	public function add_worker_selection ($out, $worker_id) {
		$paddings = !empty($this->_data['worker_padding'][$worker_id])
			? $this->_data['worker_padding'][$worker_id]
			: array(self::PADDING_BEFORE => 0, self::PADDING_AFTER => 0)
		;
		$range = range(0, 180, 5);
		$out .= '<div class="app-worker_padding">';
		$out .= '<h4>' . __('Padding times', 'appointments') . '</h4>';
		$out .= '<label>';
		$out .= $this->_allowed_positions[self::PADDING_BEFORE] . "&nbsp;<select name='worker_padding_before[{$worker_id}]'>";
		foreach ($range as $value) {
			$selected = selected($paddings[self::PADDING_BEFORE], $value, false);
			$out .= "<option value='{$value}' {$selected}>{$value}</option>";
		}
		$out .= '</select>';
		$out .= '</label>';
		$out .= '<label>';
		$out .= $this->_allowed_positions[self::PADDING_AFTER] . "&nbsp;<select name='worker_padding_after[{$worker_id}]'>";
		foreach ($range as $value) {
			$selected = selected($paddings[self::PADDING_AFTER], $value, false);
			$out .= "<option value='{$value}' {$selected}>{$value}</option>";
		}
		$out .= '</select>';
		$out .= '</label>';
		$out .= '</div>';

		return strtr($out, "'", '"'); // We have to escape this, because of the way the JS injection works on the services page (wtf really o.0)
	}

	public function save_service_padding ($service_id) {
		if (!isset($_POST['service_padding_before'][$service_id]) || !isset($_POST['service_padding_after'][$service_id])) return false;
		$before = isset($_POST['service_padding_before'][$service_id])
			? (int)$_POST['service_padding_before'][$service_id]
			: 0
		;
		$after = isset($_POST['service_padding_after'][$service_id])
			? (int)$_POST['service_padding_after'][$service_id]
			: 0
		;
		$services_padding = get_option('appointments_services_padding', array());
		$services_padding[$service_id] = array(
			self::PADDING_BEFORE => $before,
			self::PADDING_AFTER => $after,
		);
		update_option('appointments_services_padding', $services_padding);
	}

	public function save_worker_padding ($worker_id) {
		if (!isset($_POST['worker_padding_before'][$worker_id]) || !isset($_POST['worker_padding_after'][$worker_id])) return false;
		$before = isset($_POST['worker_padding_before'][$worker_id])
			? (int)$_POST['worker_padding_before'][$worker_id]
			: 0
		;
		$after = isset($_POST['worker_padding_after'][$worker_id])
			? (int)$_POST['worker_padding_after'][$worker_id]
			: 0
		;
		$workers_padding = get_option('appointments_workers_padding', array());
		$workers_padding[$worker_id] = array(
			self::PADDING_BEFORE => $before,
			self::PADDING_AFTER => $after,
		);
		update_option('appointments_workers_padding', $workers_padding);
	}

	/**
	 * Set up the padding increment on both ends
	 * and dispatch start time tweak.
	 */
	public function apply_step_increment_padding ($step) {
		$before = $this->_get_padding_before();
		$after = $this->_get_padding_after();

		if (!empty($before)) add_filter('app_ccs', array($this, 'apply_service_padding_before'));

		return $before + $step + $after;
	}

	public function apply_service_padding_before ($ccs) {
		$before = $this->_get_padding_before();
		return $ccs + (int)$before;
	}

	private function _get_padding_before () {
		$service_padding = $this->_get_current_service_padding();
		$worker_padding = $this->_get_current_worker_padding();

		$service_time = !empty($service_padding[self::PADDING_BEFORE])
			? (int)$service_padding[self::PADDING_BEFORE]
			: 0
		;
		$worker_time = !empty($worker_padding[self::PADDING_BEFORE])
			? (int)$worker_padding[self::PADDING_BEFORE]
			: 0
		;
		$additive = 0;
		switch ($this->_data['schedule_padding']['type']) {
			case self::PADDING_TYPE_CUMULATIVE:
				$additive = $service_time + $worker_time;
				break;
			case self::PADDING_TYPE_SMALLEST:
				$additive = $service_time < $worker_time ? $service_time : $worker_time;
				break;
			case self::PADDING_TYPE_LARGEST:
			default:
				$additive = $service_time > $worker_time ? $service_time : $worker_time;
				break;
		}
		return $additive*60;
	}

	public function _get_padding_after () {
		$service_padding = $this->_get_current_service_padding();
		$worker_padding = $this->_get_current_worker_padding();

		$service_time = !empty($service_padding[self::PADDING_AFTER])
			? (int)$service_padding[self::PADDING_AFTER]
			: 0
		;
		$worker_time = !empty($worker_padding[self::PADDING_AFTER])
			? (int)$worker_padding[self::PADDING_AFTER]
			: 0
		;
		$additive = 0;
		switch ($this->_data['schedule_padding']['type']) {
			case self::PADDING_TYPE_CUMULATIVE:
				$additive = $service_time + $worker_time;
				break;
			case self::PADDING_TYPE_SMALLEST:
				$additive = $service_time < $worker_time ? $service_time : $worker_time;
				break;
			case self::PADDING_TYPE_LARGEST:
			default:
				$additive = $service_time > $worker_time ? $service_time : $worker_time;
				break;
		}
		return $additive*60;
	}

	private function _get_current_worker_padding () {
		if ($this->_core->worker && !empty($this->_data['worker_padding'][$this->_core->worker])) {
			// Determine the service padding
			return $this->_data['worker_padding'][$this->_core->worker];
		}
		return false;
	}

	private function _get_current_service_padding () {
		global $current_screen;
		if( is_admin() && !empty($current_screen) && $current_screen->id == 'appointments_page_app_settings'){
			if( !empty($_REQUEST['tab']) && $_REQUEST['tab'] == 'working_hours' ){
				$service = 0;
				if( $this->_core->worker ){
					$service = $this->resolve_service_id($this->_core->worker);
				} else {
					$service = $this->resolve_service_id();
				}

				$this->_core->service = $service ? $service : $this->_core->service;
			}
		} else if ( is_admin() && DOING_AJAX ) {
			//Get service ID for the current appointment when using inline edit.
			if($_REQUEST['action'] == 'inline_edit' && !empty($_REQUEST['app_id'])){
				$app = $this->_core->get_app($_REQUEST['app_id']);
				$this->_core->service = $app->service;
			}
		}
		if ($this->_core->service && !empty($this->_data['service_padding'][$this->_core->service])) {
			// Determine the service padding
			return $this->_data['service_padding'][$this->_core->service];
		}
		return false;
	}

	public function apply_admin_min_time_padding($time){
		return $time; // Do NOT!! do this - messes up _everything_

		$time_sec = 60 * $time;//Minutes to seconds.
		$time = $this->apply_step_increment_padding($time_sec);//Calculate the padding in seconds.
		$time = $time / 60;//Back to minutes.

		return $time;
	}

	private function resolve_service_id ($worker = false){
		//Try to guess the service ID related to the working hours.
		//This would be accurate only for specific providers providing a single service.
		$services = array();
		if($worker){
			$services = $this->_core->get_services_by_worker($worker);
		} else {
			$services = $this->_core->get_services();
		}
		foreach( $services as $key => $service ){
			if ($this->_data['service_padding'][$service->ID][self::PADDING_BEFORE] || $this->_data['service_padding'][$service->ID][self::PADDING_AFTER] ){
				return $service->ID;
			}
		}

		return false;
	}

}
App_Schedule_Paddings::serve();