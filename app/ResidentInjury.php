<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResidentInjury extends Model
{
    protected $table = 'resident_injury';
	protected $fillable = ['pros_id', 'med_record_no', 'injury_date', 'event_code', 'injury_time', 'injury_time', 'location_code', 'injury_code', 'injury_brief_details', 
	'person_involve', 'attachment','first_aid', 'action_taken', 'action_taken_nurse','cp_update', 'cp_upload_nurse', 'check_notice', 'check_notice1', 'check_notice2', 
	'check_notice3', 'check_notice4', 'check_notice5', 'check_notice6', 'check_notice7', 'check_notice8','fall_time', 'where_found', 'bp_lying', 'bp_sitting',
	'puls', 'resp', 'diabetic', 'blood_suger', 'incontinence', 'use_of_wc', 'last_meal_time', 'type_of_location_of_assist_device', 'glasses', 'hearing_aide', 
	'floor_clear', 'floor_clear_specific', 'lighting', 'lighting_other', 'last_toilet', 'shoes', 'socks', 'fall_activity', 'use_of_call_light', 'call_light_within_use', 
	'bedrail_position', 'brakes_on_wc', 'ambulatory', 'alarm_bed', 'alarm_chair', 'alarm_other', 'resident_confused', 'psychotropic_med', 'psychotropic_med_time', 
	'bed_brakes', 'other_info', 'environmental_issues', 'environmental_issues_specify', 'resident_location_when_found', 'visitor_prior_8_hours', 
	'visitor_prior_8_hours_who', 'new_staff_assigned', 'new_staff_assigned_who', 'behavior_issues_past_72_hours', 'behavior_issues_past_72_hours_yes',
	'bedrail_position', 'resident_confused_skin', 'on_prednisone', 'other_pertinent_info', 'equipment_issues', 'equipment_issues_specify', 'activity_at_time_of_bruiseskin_tear',
	'transfer_from_bed_or_chair', 'recent_fall_past_72_hours_skin', 'seated_next_to', 'seated_next_to_person', 'ambulatory_skin', 'on_coumadin', 
	'other_pertinent_info_skin', 'behaviour_environmental_issues', 'behaviour_environmental_issues_specify', 'assessed_for_pain', 'assessed_for_pain_medicated', 
	'urine_dip_results', 'activity_at_time_of_behavior', 'unfamiliar_care_giver', 'care_giver_name', 'other_pertinent_info_behaviour', 'investigation', 
	'user_id', 'injury_entry_date', 'injury_status', 'rulled_out', 'how_rulled_out', 'aps_notified'];
	
	public $timestamps = false;
}
