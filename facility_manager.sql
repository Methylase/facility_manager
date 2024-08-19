-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 12, 2024 at 01:52 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facility_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contract`
--

CREATE TABLE `emergency_contract` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `other_relationship_to_yp` varchar(50) DEFAULT NULL,
  `main_contact_number` varchar(50) DEFAULT NULL,
  `secondary_contact_number` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `country_territory` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `start_date` varchar(50) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_date` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `communication_method` varchar(50) DEFAULT NULL,
  `venue_of_session` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `creator_id` varchar(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_contract`
--

INSERT INTO `emergency_contract` (`id`, `first_name`, `last_name`, `other_relationship_to_yp`, `main_contact_number`, `secondary_contact_number`, `email`, `address`, `country_territory`, `state`, `street`, `start_date`, `start_time`, `end_date`, `end_time`, `session`, `communication_method`, `venue_of_session`, `notes`, `creator_id`, `status`) VALUES
(1, 'ttttt', 'FFFFF', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(2, 'efggg', 'FFFF', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(3, 'dffff', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', 'delete'),
(4, 'eeerooooooe', 'KJKK', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `incident_report`
--

CREATE TABLE `incident_report` (
  `id` int(11) NOT NULL,
  `police_involve` varchar(50) DEFAULT NULL,
  `fire_brigade_involved` varchar(50) DEFAULT NULL,
  `ambulance_involved` varchar(50) DEFAULT NULL,
  `details_of_emergency_survive_involved` varchar(50) DEFAULT NULL,
  `involved_external_person` varchar(50) DEFAULT NULL,
  `names_of_external_person` varchar(50) DEFAULT NULL,
  `social_service_involved` varchar(50) DEFAULT NULL,
  `cmht_involved` varchar(50) DEFAULT NULL,
  `other_external_services_involved` varchar(50) DEFAULT NULL,
  `names_of_other_external_services_involved` varchar(50) DEFAULT NULL,
  `date_of_incident` varchar(50) DEFAULT NULL,
  `time_of_incident` varchar(50) DEFAULT NULL,
  `is_this_serious_incident` varchar(50) DEFAULT NULL,
  `your_cause_of_concern_about_yp_yps_child` varchar(50) DEFAULT NULL,
  `what_is_the_sub_category_of_your_cause_of_concern` varchar(50) DEFAULT NULL,
  `want_to_monitor_concern` varchar(50) DEFAULT NULL,
  `is_yp_in_significant_harm` varchar(50) DEFAULT NULL,
  `do_you_want_to_take_further_action` varchar(50) DEFAULT NULL,
  `is_yp_aware_that_you_will_contact_external_agencies` varchar(50) DEFAULT NULL,
  `if_no_enter_brief_outline_otherwise_write_n_a` text DEFAULT NULL,
  `allegations_suspension_of_substance_abuse` text DEFAULT NULL,
  `witness_es_statements_need_to_be_taken_down` varchar(50) DEFAULT NULL,
  `has_a_manager_been_informed` varchar(50) DEFAULT NULL,
  `has_a_marac_referral_been_made` varchar(50) DEFAULT NULL,
  `i_a_of_marac_refferal` text DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `last_modified` text DEFAULT NULL,
  `start_date` varchar(50) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_date` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `communication_method` varchar(50) DEFAULT NULL,
  `venue_of_session` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `creator_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incident_report`
--

INSERT INTO `incident_report` (`id`, `police_involve`, `fire_brigade_involved`, `ambulance_involved`, `details_of_emergency_survive_involved`, `involved_external_person`, `names_of_external_person`, `social_service_involved`, `cmht_involved`, `other_external_services_involved`, `names_of_other_external_services_involved`, `date_of_incident`, `time_of_incident`, `is_this_serious_incident`, `your_cause_of_concern_about_yp_yps_child`, `what_is_the_sub_category_of_your_cause_of_concern`, `want_to_monitor_concern`, `is_yp_in_significant_harm`, `do_you_want_to_take_further_action`, `is_yp_aware_that_you_will_contact_external_agencies`, `if_no_enter_brief_outline_otherwise_write_n_a`, `allegations_suspension_of_substance_abuse`, `witness_es_statements_need_to_be_taken_down`, `has_a_manager_been_informed`, `has_a_marac_referral_been_made`, `i_a_of_marac_refferal`, `created_by`, `last_modified`, `start_date`, `start_time`, `end_date`, `end_time`, `session`, `communication_method`, `venue_of_session`, `notes`, `status`, `creator_id`) VALUES
(1, 'jhhheeeeeeee', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '6'),
(2, 'fff', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'delete', '6'),
(3, 'jhhh', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '6'),
(4, 'jhhh', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `medication_report`
--

CREATE TABLE `medication_report` (
  `id` int(11) NOT NULL,
  `client` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `is_medication_still_accurate` varchar(50) DEFAULT NULL,
  `list_yps_medication_below` varchar(50) DEFAULT NULL,
  `start_date` varchar(50) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_date` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `communication_method` varchar(50) DEFAULT NULL,
  `venue_of_session` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `creator_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medication_report`
--

INSERT INTO `medication_report` (`id`, `client`, `date`, `time`, `is_medication_still_accurate`, `list_yps_medication_below`, `start_date`, `start_time`, `end_date`, `end_time`, `session`, `communication_method`, `venue_of_session`, `notes`, `status`, `creator_id`) VALUES
(1, 'ffffffeeuuu', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '6'),
(2, 'ffffffRRGHHHHeeuuu', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '6'),
(3, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, ''),
(4, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, ''),
(5, NULL, '', NULL, NULL, NULL, '', '', '', '', '', '', '', '', NULL, '6');

-- --------------------------------------------------------

--
-- Table structure for table `property_check_report`
--

CREATE TABLE `property_check_report` (
  `id` int(11) NOT NULL,
  `property_checked_name` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `date_of_check` varchar(50) DEFAULT NULL,
  `time_of_check` varchar(50) DEFAULT NULL,
  `staff_lead` varchar(50) DEFAULT NULL,
  `staff_assistant` varchar(50) DEFAULT NULL,
  `yp_assisting_check` varchar(50) DEFAULT NULL,
  `service` varchar(50) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `location_notes` varchar(50) DEFAULT NULL,
  `start_date` varchar(50) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_date` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `communication_method` varchar(50) DEFAULT NULL,
  `venue_of_session` varchar(50) DEFAULT NULL,
  `case_notes` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_check_report`
--

INSERT INTO `property_check_report` (`id`, `property_checked_name`, `type`, `date_of_check`, `time_of_check`, `staff_lead`, `staff_assistant`, `yp_assisting_check`, `service`, `room`, `location_notes`, `start_date`, `start_time`, `end_date`, `end_time`, `session`, `communication_method`, `venue_of_session`, `case_notes`, `status`, `creator_id`) VALUES
(1, 'jjjffgggj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 6),
(2, 'jjjffggrgj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'delete', 6),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `risk_accessment_plan`
--

CREATE TABLE `risk_accessment_plan` (
  `id` int(11) NOT NULL,
  `risk_accessment_plan_id` varchar(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `assessment_date` varchar(50) DEFAULT NULL,
  `next_assessment_date` varchar(50) DEFAULT NULL,
  `rap_id` varchar(50) DEFAULT NULL,
  `type_of_risk` varchar(50) DEFAULT NULL,
  `description_of_risk` varchar(50) DEFAULT NULL,
  `risk_triggers` varchar(50) DEFAULT NULL,
  `mitigating_factors` varchar(50) DEFAULT NULL,
  `plan` varchar(50) DEFAULT NULL,
  `who_needs_to_know` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `last_modified` varchar(50) DEFAULT NULL,
  `start_date` varchar(50) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_date` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `communication_method` varchar(50) DEFAULT NULL,
  `venue_of_session` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `creator_id` varchar(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `risk_accessment_plan`
--

INSERT INTO `risk_accessment_plan` (`id`, `risk_accessment_plan_id`, `name`, `assessment_date`, `next_assessment_date`, `rap_id`, `type_of_risk`, `description_of_risk`, `risk_triggers`, `mitigating_factors`, `plan`, `who_needs_to_know`, `created_by`, `last_modified`, `start_date`, `start_time`, `end_date`, `end_time`, `session`, `communication_method`, `venue_of_session`, `notes`, `creator_id`, `status`) VALUES
(1, '566', 'ggggg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(2, '505500', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(3, '5000', 'iiiii', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', ''),
(4, '5000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', 'delete'),
(5, '5000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `room_check_report`
--

CREATE TABLE `room_check_report` (
  `id` int(11) NOT NULL,
  `service` varchar(50) DEFAULT NULL,
  `compiled_by` varchar(50) DEFAULT NULL,
  `staff_lead` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `walls_in_good_condition` varchar(50) DEFAULT NULL,
  `lights_and_switches_in_good_condition` varchar(50) DEFAULT NULL,
  `curtains_and_rails_in_good_condition` varchar(50) DEFAULT NULL,
  `electrical_sockets_in_good_condition` varchar(50) DEFAULT NULL,
  `windows` varchar(50) DEFAULT NULL,
  `windows_locks_restriction_in_place` varchar(50) DEFAULT NULL,
  `fire_notices_are_posted` varchar(50) DEFAULT NULL,
  `radiators_are_working_with_no_leaks` varchar(50) DEFAULT NULL,
  `furniture_in_good_condition` varchar(50) DEFAULT NULL,
  `no_sign_of_pest_contamination` varchar(50) DEFAULT NULL,
  `floor_coverings_in_good_condition` varchar(50) DEFAULT NULL,
  `bathroom_clean_and_in_working_order` varchar(50) DEFAULT NULL,
  `kitchen_area_clean_and_tidy` varchar(50) DEFAULT NULL,
  `overall_cleanliness_and_hygeine` varchar(50) DEFAULT NULL,
  `bins_clean_and_tidy` varchar(50) DEFAULT NULL,
  `beddings_clean` varchar(50) DEFAULT NULL,
  `smoke_alarms_tested_and_working` varchar(50) DEFAULT NULL,
  `carbon_monoxide_alarm_tested` varchar(50) DEFAULT NULL,
  `evidence_of_battery_charger_used` varchar(50) DEFAULT NULL,
  `start_date` varchar(50) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_date` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `communication_method` varchar(50) DEFAULT NULL,
  `venue_of_session` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `creator_id` varchar(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_check_report`
--

INSERT INTO `room_check_report` (`id`, `service`, `compiled_by`, `staff_lead`, `date`, `type`, `walls_in_good_condition`, `lights_and_switches_in_good_condition`, `curtains_and_rails_in_good_condition`, `electrical_sockets_in_good_condition`, `windows`, `windows_locks_restriction_in_place`, `fire_notices_are_posted`, `radiators_are_working_with_no_leaks`, `furniture_in_good_condition`, `no_sign_of_pest_contamination`, `floor_coverings_in_good_condition`, `bathroom_clean_and_in_working_order`, `kitchen_area_clean_and_tidy`, `overall_cleanliness_and_hygeine`, `bins_clean_and_tidy`, `beddings_clean`, `smoke_alarms_tested_and_working`, `carbon_monoxide_alarm_tested`, `evidence_of_battery_charger_used`, `start_date`, `start_time`, `end_date`, `end_time`, `session`, `communication_method`, `venue_of_session`, `notes`, `creator_id`, `status`) VALUES
(1, 'hhhgogffdtyykjjffjddjbdsdogo', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(2, 'uufffo', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `service_check_daily_report`
--

CREATE TABLE `service_check_daily_report` (
  `id` int(11) NOT NULL,
  `service` text DEFAULT NULL,
  `compiled_by` text DEFAULT NULL,
  `staff_lead` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `escape_route` text DEFAULT NULL,
  `fire_warning_indicator` text DEFAULT NULL,
  `emergency_lightning_good` text DEFAULT NULL,
  `extinguishers_fire_fighters` text DEFAULT NULL,
  `flammable_material_secure` text DEFAULT NULL,
  `evidence_of_used_battery_charger` text DEFAULT NULL,
  `kitchen_is_clean_and_tidy` text DEFAULT NULL,
  `cooker_Extractor_in_good_condition` text DEFAULT NULL,
  `floor_are_non_slip_and_dry` text DEFAULT NULL,
  `adequate_handwashing_facilities` text DEFAULT NULL,
  `food_waste_in_suitable_containers` text DEFAULT NULL,
  `food_stored_in_suitable_containers` text DEFAULT NULL,
  `fridge_and_freezers_are_working` text DEFAULT NULL,
  `floor_stairways_and_corridor_clear` text DEFAULT NULL,
  `floors_are_free_from_trailing_wires` text DEFAULT NULL,
  `floor_converings_in_good_condition` text DEFAULT NULL,
  `secure_handrails_and_stairways` text DEFAULT NULL,
  `bathroom_clean_and_working` text DEFAULT NULL,
  `running_water` text DEFAULT NULL,
  `maintenance_hours_reported` text DEFAULT NULL,
  `refuse_collected_store_correctly` text DEFAULT NULL,
  `start_date` text DEFAULT NULL,
  `start_time` text DEFAULT NULL,
  `end_date` text DEFAULT NULL,
  `end_time` text DEFAULT NULL,
  `session` text DEFAULT NULL,
  `communication_method` text DEFAULT NULL,
  `venue_of_session` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `creator_id` varchar(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_check_daily_report`
--

INSERT INTO `service_check_daily_report` (`id`, `service`, `compiled_by`, `staff_lead`, `date`, `escape_route`, `fire_warning_indicator`, `emergency_lightning_good`, `extinguishers_fire_fighters`, `flammable_material_secure`, `evidence_of_used_battery_charger`, `kitchen_is_clean_and_tidy`, `cooker_Extractor_in_good_condition`, `floor_are_non_slip_and_dry`, `adequate_handwashing_facilities`, `food_waste_in_suitable_containers`, `food_stored_in_suitable_containers`, `fridge_and_freezers_are_working`, `floor_stairways_and_corridor_clear`, `floors_are_free_from_trailing_wires`, `floor_converings_in_good_condition`, `secure_handrails_and_stairways`, `bathroom_clean_and_working`, `running_water`, `maintenance_hours_reported`, `refuse_collected_store_correctly`, `start_date`, `start_time`, `end_date`, `end_time`, `session`, `communication_method`, `venue_of_session`, `notes`, `creator_id`, `status`) VALUES
(1, 'rerttre', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(2, 'rrrhjrrriejejj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(3, 'eee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(4, '{\"service\":\"rerttre\",\"action_1\":\"dderrrrrfdgfgg er', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(5, 'rrrhjrrriejejj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(6, 'rrrhjrrriejejj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(7, 'rrrhjrrriejejj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_check_monthly_report`
--

CREATE TABLE `service_check_monthly_report` (
  `id` int(11) NOT NULL,
  `door_seals_and_self_closing_devices` text DEFAULT NULL,
  `internal_self_closing_firedoors` text DEFAULT NULL,
  `emergency_lightning_function` text DEFAULT NULL,
  `evidence_of_used_battery_charger` text DEFAULT NULL,
  `washing_machine_filter_cleaned` text DEFAULT NULL,
  `water_dispenser_drip_trays_cleaned` text DEFAULT NULL,
  `auto_hold_open_freeswing_doors_fitted` text DEFAULT NULL,
  `sample_water_temperature_test` text DEFAULT NULL,
  `no_smoking_sign_displayed` text DEFAULT NULL,
  `furniture_complaints_updated_closed` text DEFAULT NULL,
  `completed_repairs_updated_closed` text DEFAULT NULL,
  `add_decoration_to_maintainance` text DEFAULT NULL,
  `portal_appliances_tested_accurately` text DEFAULT NULL,
  `kitchen_is_clean_tidy` text DEFAULT NULL,
  `cooker_extractor_in_good_condition` text DEFAULT NULL,
  `fridge_and_freezers_are_working` text DEFAULT NULL,
  `staff_have_sufficient_space` text DEFAULT NULL,
  `bins_are_emptied_regularly` text DEFAULT NULL,
  `desk_work_area_suitable` text DEFAULT NULL,
  `seat_lower_back_support` text DEFAULT NULL,
  `rooms_are_adequately_ventilated` text DEFAULT NULL,
  `photocopier_printer_in_good_condition` text DEFAULT NULL,
  `unused_water_outlet_flushed` text DEFAULT NULL,
  `showerheads_in_good_conditions` text DEFAULT NULL,
  `provision_disposal_of_sanitary_towels` text DEFAULT NULL,
  `cable_coverings_in_good_conditions` text DEFAULT NULL,
  `electrical_equipment_in_good_condition` text DEFAULT NULL,
  `electrical_sockets_in_good_condition` text DEFAULT NULL,
  `power_socket_not_overloaded` text DEFAULT NULL,
  `working_environment_satisfactory` text DEFAULT NULL,
  `chairs_in_good_condition_adjustable` text DEFAULT NULL,
  `coshh_cupboards_signed_locked` text DEFAULT NULL,
  `first_notice_and_posters` text DEFAULT NULL,
  `first_exit_and_other_signs_in_place` text DEFAULT NULL,
  `first_aid_arrangement_posters` text DEFAULT NULL,
  `employers_insurance_liability_shown` text DEFAULT NULL,
  `health_safety_law_poster_shown` text DEFAULT NULL,
  `items_are_safely_stored` text DEFAULT NULL,
  `entrance_exit_free_from_obstruction` text DEFAULT NULL,
  `entrance_area_in_good_condition` text DEFAULT NULL,
  `cctv_in_good_working_condition` text DEFAULT NULL,
  `box_location_1` text DEFAULT NULL,
  `no_of_guidance_leaflet_1` text DEFAULT NULL,
  `no_of_adhesive_dressings_1` text DEFAULT NULL,
  `no_of_adhesive_pads_with_bandage_1` text DEFAULT NULL,
  `no_of_wrapped_triangular_bandage_1` text DEFAULT NULL,
  `no_of_medium_dressings_1` text DEFAULT NULL,
  `no_of_large_dressings_1` text DEFAULT NULL,
  `no_of_safety_pins_1` text DEFAULT NULL,
  `box_location_2` text DEFAULT NULL,
  `no_of_guidance_leaflet_2` text DEFAULT NULL,
  `no_of_adhesive_dressings_2` text DEFAULT NULL,
  `no_of_adhesive_pads_with_bandage_2` text DEFAULT NULL,
  `no_of_wrapped_triangular_bandage_2` text DEFAULT NULL,
  `no_of_medium_dressings_2` text DEFAULT NULL,
  `no_of_large_dressings_2` text DEFAULT NULL,
  `no_of_safety_pins_2` text DEFAULT NULL,
  `no_of_moisture_cleaning_wipes` text DEFAULT NULL,
  `start_date` varchar(50) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_date` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `communication_method` varchar(50) DEFAULT NULL,
  `venue_of_session` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `creator_id` varchar(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_check_monthly_report`
--

INSERT INTO `service_check_monthly_report` (`id`, `door_seals_and_self_closing_devices`, `internal_self_closing_firedoors`, `emergency_lightning_function`, `evidence_of_used_battery_charger`, `washing_machine_filter_cleaned`, `water_dispenser_drip_trays_cleaned`, `auto_hold_open_freeswing_doors_fitted`, `sample_water_temperature_test`, `no_smoking_sign_displayed`, `furniture_complaints_updated_closed`, `completed_repairs_updated_closed`, `add_decoration_to_maintainance`, `portal_appliances_tested_accurately`, `kitchen_is_clean_tidy`, `cooker_extractor_in_good_condition`, `fridge_and_freezers_are_working`, `staff_have_sufficient_space`, `bins_are_emptied_regularly`, `desk_work_area_suitable`, `seat_lower_back_support`, `rooms_are_adequately_ventilated`, `photocopier_printer_in_good_condition`, `unused_water_outlet_flushed`, `showerheads_in_good_conditions`, `provision_disposal_of_sanitary_towels`, `cable_coverings_in_good_conditions`, `electrical_equipment_in_good_condition`, `electrical_sockets_in_good_condition`, `power_socket_not_overloaded`, `working_environment_satisfactory`, `chairs_in_good_condition_adjustable`, `coshh_cupboards_signed_locked`, `first_notice_and_posters`, `first_exit_and_other_signs_in_place`, `first_aid_arrangement_posters`, `employers_insurance_liability_shown`, `health_safety_law_poster_shown`, `items_are_safely_stored`, `entrance_exit_free_from_obstruction`, `entrance_area_in_good_condition`, `cctv_in_good_working_condition`, `box_location_1`, `no_of_guidance_leaflet_1`, `no_of_adhesive_dressings_1`, `no_of_adhesive_pads_with_bandage_1`, `no_of_wrapped_triangular_bandage_1`, `no_of_medium_dressings_1`, `no_of_large_dressings_1`, `no_of_safety_pins_1`, `box_location_2`, `no_of_guidance_leaflet_2`, `no_of_adhesive_dressings_2`, `no_of_adhesive_pads_with_bandage_2`, `no_of_wrapped_triangular_bandage_2`, `no_of_medium_dressings_2`, `no_of_large_dressings_2`, `no_of_safety_pins_2`, `no_of_moisture_cleaning_wipes`, `start_date`, `start_time`, `end_date`, `end_time`, `session`, `communication_method`, `venue_of_session`, `notes`, `creator_id`, `status`) VALUES
(1, 'lllgrrrrrrgggffggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', 'delete'),
(2, 'grrrrrrgggffggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(3, 'ggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', NULL),
(4, 'ggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(5, 'ggggfggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(6, 'ggggfggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_check_weekly_report`
--

CREATE TABLE `service_check_weekly_report` (
  `id` int(11) NOT NULL,
  `smoke_alarm_tested_and_working` text DEFAULT NULL,
  `fire_alarm_points_system_working` text DEFAULT NULL,
  `carbon_monoxide_alarm_tested` text DEFAULT NULL,
  `charging_indicator_on_emergency_lighting` text DEFAULT NULL,
  `evidence_of_used_battery_charger` text DEFAULT NULL,
  `washing_machine_filter_cleaned` text DEFAULT NULL,
  `water_filter_in_staff_office_changed` text DEFAULT NULL,
  `charcoal_filter_changed_to_ovenhob` text DEFAULT NULL,
  `unneccesary_combustible_material` text DEFAULT NULL,
  `ventilations_are_not_obstructed` text DEFAULT NULL,
  `lightning_levels_are_adequate` text DEFAULT NULL,
  `lights_are_working_satisfactorily` text DEFAULT NULL,
  `line_filter_in_tumble_dryer_cleaned` text DEFAULT NULL,
  `kitchen_is_clean_tidy` text DEFAULT NULL,
  `cooker_extractor_in_good_condition` text DEFAULT NULL,
  `fridge_and_freezers_are_working` text DEFAULT NULL,
  `staff_have_sufficient_space` text DEFAULT NULL,
  `desk_work_area_suitable` text DEFAULT NULL,
  `seat_lower_back_support` text DEFAULT NULL,
  `unused_water_outlet_flushed` text DEFAULT NULL,
  `showerheads_in_good_conditions` text DEFAULT NULL,
  `provision_disposal_of_sanitary_towels` text DEFAULT NULL,
  `cable_coverings_in_good_conditions` text DEFAULT NULL,
  `electrical_equipment_in_good_condition` text DEFAULT NULL,
  `electrical_sockets_in_good_condition` text DEFAULT NULL,
  `power_socket_not_overloaded` text DEFAULT NULL,
  `working_environment_satisfactory` text DEFAULT NULL,
  `chairs_good_condition_adjustable` text DEFAULT NULL,
  `coshh_cupboards_signed_and_locked` text DEFAULT NULL,
  `first_aid_arrangement_posters` text DEFAULT NULL,
  `employers_insurance_liability_shown` text DEFAULT NULL,
  `health_safety_law_poster_shown` text DEFAULT NULL,
  `entrance_exit_free_from_obstruction` text DEFAULT NULL,
  `entrance_area_in_good_condition` text DEFAULT NULL,
  `drains_and_water_pipes_working` text DEFAULT NULL,
  `cctv_in_working_conditions` text DEFAULT NULL,
  `no_item_to_start_fire` text DEFAULT NULL,
  `refuse_collected_store_correctly` text DEFAULT NULL,
  `security_lightning_is_working` text DEFAULT NULL,
  `box_location_1` text DEFAULT NULL,
  `no_of_guidance_leaflet_1` text DEFAULT NULL,
  `no_of_adhesive_dressings_1` text DEFAULT NULL,
  `no_of_adhesive_pads_with_bandage_1` text DEFAULT NULL,
  `no_of_wrapped_triangular_bandage_1` text DEFAULT NULL,
  `no_of_medium_dressings_1` text DEFAULT NULL,
  `no_of_large_dressings_1` text DEFAULT NULL,
  `no_of_safety_pins_1` text DEFAULT NULL,
  `box_location_2` text DEFAULT NULL,
  `no_of_guidance_leaflet_2` text DEFAULT NULL,
  `no_of_adhesive_dressings_2` text DEFAULT NULL,
  `no_of_adhesive_pads_with_bandage_2` text DEFAULT NULL,
  `no_of_wrapped_triangular_bandage_2` text DEFAULT NULL,
  `no_of_medium_dressings_2` text DEFAULT NULL,
  `no_of_large_dressings_2` text DEFAULT NULL,
  `no_of_safety_pins_2` text DEFAULT NULL,
  `no_of_moisture_cleaning_wipes` text DEFAULT NULL,
  `start_date` varchar(50) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_date` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `communication_method` varchar(50) DEFAULT NULL,
  `venue_of_session` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `creator_id` varchar(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_check_weekly_report`
--

INSERT INTO `service_check_weekly_report` (`id`, `smoke_alarm_tested_and_working`, `fire_alarm_points_system_working`, `carbon_monoxide_alarm_tested`, `charging_indicator_on_emergency_lighting`, `evidence_of_used_battery_charger`, `washing_machine_filter_cleaned`, `water_filter_in_staff_office_changed`, `charcoal_filter_changed_to_ovenhob`, `unneccesary_combustible_material`, `ventilations_are_not_obstructed`, `lightning_levels_are_adequate`, `lights_are_working_satisfactorily`, `line_filter_in_tumble_dryer_cleaned`, `kitchen_is_clean_tidy`, `cooker_extractor_in_good_condition`, `fridge_and_freezers_are_working`, `staff_have_sufficient_space`, `desk_work_area_suitable`, `seat_lower_back_support`, `unused_water_outlet_flushed`, `showerheads_in_good_conditions`, `provision_disposal_of_sanitary_towels`, `cable_coverings_in_good_conditions`, `electrical_equipment_in_good_condition`, `electrical_sockets_in_good_condition`, `power_socket_not_overloaded`, `working_environment_satisfactory`, `chairs_good_condition_adjustable`, `coshh_cupboards_signed_and_locked`, `first_aid_arrangement_posters`, `employers_insurance_liability_shown`, `health_safety_law_poster_shown`, `entrance_exit_free_from_obstruction`, `entrance_area_in_good_condition`, `drains_and_water_pipes_working`, `cctv_in_working_conditions`, `no_item_to_start_fire`, `refuse_collected_store_correctly`, `security_lightning_is_working`, `box_location_1`, `no_of_guidance_leaflet_1`, `no_of_adhesive_dressings_1`, `no_of_adhesive_pads_with_bandage_1`, `no_of_wrapped_triangular_bandage_1`, `no_of_medium_dressings_1`, `no_of_large_dressings_1`, `no_of_safety_pins_1`, `box_location_2`, `no_of_guidance_leaflet_2`, `no_of_adhesive_dressings_2`, `no_of_adhesive_pads_with_bandage_2`, `no_of_wrapped_triangular_bandage_2`, `no_of_medium_dressings_2`, `no_of_large_dressings_2`, `no_of_safety_pins_2`, `no_of_moisture_cleaning_wipes`, `start_date`, `start_time`, `end_date`, `end_time`, `session`, `communication_method`, `venue_of_session`, `notes`, `creator_id`, `status`) VALUES
(1, 'ggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(2, 'jjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(3, 'wwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(4, 'ggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(6, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(7, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(8, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(9, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_profile`
--

CREATE TABLE `service_profile` (
  `id` int(11) NOT NULL,
  `service_code` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `landline` varchar(50) DEFAULT NULL,
  `emergency_number` varchar(50) DEFAULT NULL,
  `service_type` varchar(50) DEFAULT NULL,
  `number_of_beds` varchar(50) DEFAULT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  `service_manager` varchar(50) DEFAULT NULL,
  `deputy_manager` varchar(50) DEFAULT NULL,
  `on_call_1` varchar(50) DEFAULT NULL,
  `on_call_2` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `age_range` varchar(50) DEFAULT NULL,
  `duration_of_stay` varchar(50) DEFAULT NULL,
  `lone_working` varchar(50) DEFAULT NULL,
  `challenging_behavior` varchar(50) DEFAULT NULL,
  `personal_care_support` varchar(50) DEFAULT NULL,
  `physical_challenge` varchar(50) DEFAULT NULL,
  `sleep_in_bed` varchar(50) DEFAULT NULL,
  `parking` varchar(50) DEFAULT NULL,
  `pets` varchar(50) DEFAULT NULL,
  `unpaid_breaks` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `creator_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_profile`
--

INSERT INTO `service_profile` (`id`, `service_code`, `service`, `address`, `phone_number`, `landline`, `emergency_number`, `service_type`, `number_of_beds`, `specialization`, `service_manager`, `deputy_manager`, `on_call_1`, `on_call_2`, `gender`, `age_range`, `duration_of_stay`, `lone_working`, `challenging_behavior`, `personal_care_support`, `physical_challenge`, `sleep_in_bed`, `parking`, `pets`, `unpaid_breaks`, `created_by`, `status`, `creator_id`) VALUES
(1, '', 'Renting', 'address', 'phone number', 'landline', 'emergency_number', 'service_type', 'number_of_beds', 'specialization', 'service_manager', 'deputy_manager', 'on_call_1', 'on_call_2', 'gender', 'age_range', 'duration_of_stay', 'lone_working', 'challenging_behavior', 'personal_care_support', 'physical_challenge', 'sleep_in_bed', 'parking', 'pets', 'unpaid_breaks', 'created_by', 'delete', '1'),
(2, 'errfvvvffrre', 'Renting', 'address', 'phone number', 'landline', 'emergency_number', 'service_type', 'number_of_beds', 'specialization', 'service_manager', 'deputy_manager', 'on_call_1', 'on_call_2', 'gender', 'age_range', 'duration_of_stay', 'lone_working', 'challenging_behavior', 'personal_care_support', 'physical_challenge', 'sleep_in_bed', 'parking', 'pets', 'unpaid_breaks', 'created_by', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `service_worker_profile`
--

CREATE TABLE `service_worker_profile` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `profile_image` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `own_user_id` varchar(11) NOT NULL,
  `creator_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_worker_profile`
--

INSERT INTO `service_worker_profile` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `address`, `profile_image`, `created_by`, `status`, `own_user_id`, `creator_id`) VALUES
(1, 'moradeke', 'adeola', 'methyl2007@yahoo.com', 'phone number', '29 old lawson', 'ff.jpg', 'admin', NULL, '1', '1'),
(2, 'moradekeeee', 'adeola', 'methyl2008@yahoo.com', 'phone number', '29 old lawson', 'ff.jpg', 'admin', NULL, '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `user_id`, `token`, `expires_at`) VALUES
(1, 1, '227e9de33cca6f5d5a497212570c2c090fd8ad9fcf168e13f12c291b995d91c4', '2024-08-04 06:56:30'),
(2, 1, 'bdd47142d6e29de96cb3cf8b61c9dd57ec3cf38c9dbe77e03e279cf7035fc166', '2024-08-04 06:59:48'),
(3, 1, '33de7b31324836438c79059e673ef9d93f4b4130355572edee78c76b3d774148', '2024-08-04 07:00:12'),
(4, 1, 'e0a815abbc40fe3ae50d9b525edab3b4ac8acf26986078f1e0d1765495679dd0', '2024-08-04 07:01:45'),
(5, 1, 'f1041d00bdd60f011a5ca3f27e64b4ced370d069622a05e783c5f5217fe89e0b', '2024-08-04 07:03:10'),
(6, 1, '86396a9970190c427db6da459ff46bb6c93efb105a8b7083baff781d9c2fa10f', '2024-08-04 07:03:12'),
(7, 1, 'ab50e242a836554e9e48a8203e9e42314b8b7d73d817f3b731b830cb564dbf70', '2024-08-04 11:38:02'),
(8, 1, '6f24e9e02819cd024defa840a861c01f26ca1fa9b7c04179090d62574f2838a2', '2024-08-04 14:24:13'),
(9, 1, '59b270eaa7f8e09feba4f9cbac3351e77b40d0dea64fa38dd5a017cd7847d925', '2024-08-05 17:59:45'),
(10, 6, '632015edc024365822a51a4dd0c46ee46c4f676834d88605cd9a338e5ca7859a', '2024-08-05 18:49:20'),
(11, 6, '1aa6afd49c61e999de8379dca73e873c9a0ff9d2768baf916714226b797f2251', '2024-08-05 22:06:56'),
(12, 6, 'b60dbec0fdf568892d9db712dc760ed0604a9bdf08c4c29b46837e8746edacb8', '2024-08-05 22:34:00'),
(13, 1, 'e29b9edb7c4469ceff1301c65049003af90d90b28a67c38e651eb3a46e248c58', '2024-08-05 22:38:34'),
(14, 6, 'a375f9fb142eb9a8f47a321e56c32974b43c7c8c94ca02f9afa829a395aeb939', '2024-08-06 01:31:56'),
(15, 6, '9de27db6aaaa7d49a0ef51a5b63485c4d650497f60970df72de77c9754bc906c', '2024-08-06 05:34:10'),
(16, 6, '6061bdc5dc453c5dec2ab909c33f2e0300fb624ea5a527e2d383155d47601fbf', '2024-08-06 13:17:43'),
(17, 6, '268d0de5f7f4f041725994977d7cbd2760ac77d2040cf5ab31605c8efb3812ef', '2024-08-06 17:12:38'),
(18, 6, 'bab50fef29b5fcc400772ce8216409dbaae452e373cf43d15875d3df4a14c178', '2024-08-06 22:14:34'),
(19, 6, 'a0b222106a2707323ddc1f13fe7ea8057e5f0b5a2211a5844288c78f26b9d8af', '2024-08-07 00:16:09'),
(20, 6, 'edbb9020783997ba137f0d167e7b4abb2e4ab4230bc33cb13a6b2753af37fc27', '2024-08-07 02:54:40'),
(21, 6, '3c2b583956860d431b52cc5136bf52b5a93bb0ca7d3ea60b2131f9c3f55d54e6', '2024-08-07 11:28:04'),
(22, 6, 'f0a6297fac2637ba5121da2fcb33d9cf0976a5f7178ba27010dcfb0138eb2344', '2024-08-07 13:29:16'),
(23, 6, 'a62595796756786abe04548e7ca8d245196382cd72fac216223f0fe85ab3dbc3', '2024-08-07 15:07:12'),
(24, 6, '10f4070a4d51064a870de290c0886c5a3d361e063e6d2bdc8a44a633f9333420', '2024-08-07 15:35:58'),
(25, 6, '6af11dde66465c114af4aae199153afa04f4f29c2e03cd2a9c61e6db76d34905', '2024-08-07 17:38:59'),
(26, 6, '971f4fca13f655a2d3c7381b031f853ac64eeff2b1c8a033b7ad8baa646e8fdb', '2024-08-08 15:09:11'),
(27, 6, 'bcd1f5d8c84770e71bee574584e4d0647b82f588104f86abd9a73904e485865d', '2024-08-09 15:45:07'),
(28, 6, '754e9b338d5a45813ba39879f6aa1f0ae5c2d01010561d41f694c1306314df11', '2024-08-09 15:56:43'),
(29, 6, 'ff1abdec192a9d03123fad0cf76d663271ed58f4407b4a84558525275987b97d', '2024-08-10 12:13:36'),
(30, 6, '4dbe34e03d2d82cc5ea6134010921a770e4b83802c9845d6032afbc4012ce1ce', '2024-08-10 15:38:44'),
(31, 6, '81f67280a85aa0a08bf9a828bd1c9c4f9b68db0db2c89462cc84083912db926b', '2024-08-11 18:10:39'),
(32, 6, '44b0ae947ffbaaea17a0016067ec2de360ca9a52245bf4f0d82f7c7f1924c0fe', '2024-08-11 20:33:10'),
(33, 6, '615e9d587046b154c4204e36e7556ccaf913c930531a67cf43e68f2ad3aff4d9', '2024-08-11 22:50:02'),
(34, 6, '1c48fb28984d6a34f9096bc47e2021012bc270df8ced34a72026cfe8271f6493', '2024-08-12 01:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `status`) VALUES
(1, 'methyl2007', '$2y$10$DoNmXQNZmJpwuZnnxzxoR.jW5mkmlez4vDLPjo/B3VrsFsBPV2OWO', 'admin', ''),
(6, 'adepoju', '$2y$10$xjoxJJGjiX/YR1qPDLxO3eXrFE6.17sk/Fyzr1tgajKhJJ8J9LYM2', 'user', ''),
(7, 'adepoju3', '$2y$10$AmR8UafTbk8S0P5PkYzrEOCWXLztVmhoJ7qIlxabh0Sl9T3oSKKWu', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `young_people_profile`
--

CREATE TABLE `young_people_profile` (
  `id` int(11) NOT NULL,
  `contact_type` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mailing_address` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `contact_emergency` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `first_language` varchar(50) NOT NULL,
  `immigration_status` varchar(50) NOT NULL,
  `immigration_doc_held` varchar(50) NOT NULL,
  `last_entry_date` varchar(50) NOT NULL,
  `care_level` varchar(50) NOT NULL,
  `training` varchar(50) NOT NULL,
  `education` varchar(50) NOT NULL,
  `hobbies` varchar(50) NOT NULL,
  `reasons_not_edu_training` text NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `length_of_unemployment` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `eye_color` varchar(50) NOT NULL,
  `hair_color_n_style` varchar(50) NOT NULL,
  `distinguishing_feature` varchar(50) NOT NULL,
  `cloth_usually_worn` varchar(50) NOT NULL,
  `death` varchar(50) NOT NULL,
  `plan_name` varchar(50) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `accessment_date` varchar(50) NOT NULL,
  `next_accessment_date` varchar(50) NOT NULL,
  `any_historic_details` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `concerns_mornitoring` varchar(50) NOT NULL,
  `take_further_actions` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `creator_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `young_people_profile`
--

INSERT INTO `young_people_profile` (`id`, `contact_type`, `phone_number`, `email`, `mailing_address`, `country`, `city`, `postal_code`, `contact_emergency`, `nationality`, `first_language`, `immigration_status`, `immigration_doc_held`, `last_entry_date`, `care_level`, `training`, `education`, `hobbies`, `reasons_not_edu_training`, `occupation`, `length_of_unemployment`, `height`, `eye_color`, `hair_color_n_style`, `distinguishing_feature`, `cloth_usually_worn`, `death`, `plan_name`, `service_name`, `accessment_date`, `next_accessment_date`, `any_historic_details`, `date`, `end_date`, `category`, `concerns_mornitoring`, `take_further_actions`, `notes`, `created_by`, `status`, `creator_id`) VALUES
(1, 'email', '082', 'meth@yahoo.com', '6 fade street', 'Nigeria', 'Lagos', '1011', '112', 'Nigerian', 'English', 'Active', 'Visa', '2/5/2022', 'no idea', 'no', 'degree', 'travellig', 'personal', 'Tourist', '6 months', '5.9', 'black', 'black and curl', 'no idea', 'casual dress', 'no', 'no idea', 'no idea', '5/5/2024', '6/7/2024', 'no', '4/7/2024', '6/8/2024', 'easy', 'no', 'when neccessary', 'still active', 'admin', NULL, '6'),
(2, 'email', '082', 'meth1@yahoo.com', '6 fade street', 'Nigeria', 'Lagos', '1011', '112', 'Nigerian', 'English', 'Active', 'Visa', '2/5/2022', 'no idea', 'no', 'degree', 'travellig', 'personal', 'Tourist', '6 months', '5.9', 'black', 'black and curl', 'no idea', 'casual dress', 'no', 'no idea', 'no idea', '5/5/2024', '6/7/2024', 'no', '4/7/2024', '6/8/2024', 'easy', 'no', 'when neccessary', 'still active', 'admin', 'delete', '6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emergency_contract`
--
ALTER TABLE `emergency_contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident_report`
--
ALTER TABLE `incident_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medication_report`
--
ALTER TABLE `medication_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_check_report`
--
ALTER TABLE `property_check_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risk_accessment_plan`
--
ALTER TABLE `risk_accessment_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_check_report`
--
ALTER TABLE `room_check_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_check_daily_report`
--
ALTER TABLE `service_check_daily_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_check_monthly_report`
--
ALTER TABLE `service_check_monthly_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_check_weekly_report`
--
ALTER TABLE `service_check_weekly_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_profile`
--
ALTER TABLE `service_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_worker_profile`
--
ALTER TABLE `service_worker_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `young_people_profile`
--
ALTER TABLE `young_people_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emergency_contract`
--
ALTER TABLE `emergency_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `incident_report`
--
ALTER TABLE `incident_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medication_report`
--
ALTER TABLE `medication_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property_check_report`
--
ALTER TABLE `property_check_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `risk_accessment_plan`
--
ALTER TABLE `risk_accessment_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_check_report`
--
ALTER TABLE `room_check_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_check_daily_report`
--
ALTER TABLE `service_check_daily_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_check_monthly_report`
--
ALTER TABLE `service_check_monthly_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_check_weekly_report`
--
ALTER TABLE `service_check_weekly_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service_profile`
--
ALTER TABLE `service_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_worker_profile`
--
ALTER TABLE `service_worker_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `young_people_profile`
--
ALTER TABLE `young_people_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
