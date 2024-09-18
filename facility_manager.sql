-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 09:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `case_note`
--

CREATE TABLE `case_note` (
  `id` int(11) NOT NULL,
  `start_date` varchar(50) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_date` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `communication_method` varchar(50) DEFAULT NULL,
  `venue_of_session` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `client` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `is_medication_still_accurate` varchar(50) DEFAULT NULL,
  `list_yps_medication_below` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `creator_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact`
--

CREATE TABLE `emergency_contact` (
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
  `creator_id` varchar(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency_contact`
--

INSERT INTO `emergency_contact` (`id`, `first_name`, `last_name`, `other_relationship_to_yp`, `main_contact_number`, `secondary_contact_number`, `email`, `address`, `country_territory`, `state`, `street`, `creator_id`, `status`) VALUES
(1, 'ttttt', 'FFFFF', '', '', '', '', '', '', '', '', '6', NULL),
(2, 'efggg', 'FFFF', '', '', '', '', '', '', '', '', '6', NULL),
(3, 'dffff', '', '', '', '', '', '', '', '', '', '6', 'delete'),
(4, 'eeerooooooe', 'KJKK', '', '', '', '', '', '', '', '', '6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `id`
--

CREATE TABLE `id` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `status` varchar(11) DEFAULT NULL,
  `creator_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incident_report`
--

INSERT INTO `incident_report` (`id`, `police_involve`, `fire_brigade_involved`, `ambulance_involved`, `details_of_emergency_survive_involved`, `involved_external_person`, `names_of_external_person`, `social_service_involved`, `cmht_involved`, `other_external_services_involved`, `names_of_other_external_services_involved`, `date_of_incident`, `time_of_incident`, `is_this_serious_incident`, `your_cause_of_concern_about_yp_yps_child`, `what_is_the_sub_category_of_your_cause_of_concern`, `want_to_monitor_concern`, `is_yp_in_significant_harm`, `do_you_want_to_take_further_action`, `is_yp_aware_that_you_will_contact_external_agencies`, `if_no_enter_brief_outline_otherwise_write_n_a`, `allegations_suspension_of_substance_abuse`, `witness_es_statements_need_to_be_taken_down`, `has_a_manager_been_informed`, `has_a_marac_referral_been_made`, `i_a_of_marac_refferal`, `created_by`, `last_modified`, `status`, `creator_id`) VALUES
(1, 'jhhheeeeeeee', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '6'),
(2, 'fff', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'delete', '6'),
(3, 'jhhh', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '6'),
(4, 'jhhh', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `service_name` varchar(50) DEFAULT NULL,
  `room_number` varchar(50) DEFAULT NULL,
  `job_reported_by_staff_or_young_person` varchar(50) DEFAULT NULL,
  `name_of_young_person` varchar(50) DEFAULT NULL,
  `date_repair_requested` varchar(50) DEFAULT NULL,
  `time_repair_requested` varchar(50) DEFAULT NULL,
  `upload_file` varchar(50) DEFAULT NULL,
  `job_priority` varchar(50) DEFAULT NULL,
  `reference_number` varchar(50) DEFAULT NULL,
  `cost_of_repairs` varchar(50) DEFAULT NULL,
  `purchase_order_number` varchar(50) DEFAULT NULL,
  `post_job_completion_amount` text DEFAULT NULL,
  `contractor_name` varchar(50) DEFAULT NULL,
  `date_po_raised` varchar(50) DEFAULT NULL,
  `repair_timescale` varchar(50) DEFAULT NULL,
  `pre_inspection_date` varchar(50) DEFAULT NULL,
  `pre_inspection_comments` varchar(50) DEFAULT NULL,
  `post_job_completion_date` varchar(50) DEFAULT NULL,
  `repair_completion_date` varchar(50) DEFAULT NULL,
  `staff_member_sign_out` varchar(50) DEFAULT NULL,
  `system_info` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `post_completion_comments` text DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `status` varchar(50) DEFAULT NULL,
  `creator_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medication_report`
--

INSERT INTO `medication_report` (`id`, `client`, `date`, `time`, `is_medication_still_accurate`, `list_yps_medication_below`, `status`, `creator_id`) VALUES
(1, 'ffffffeeuuu', '', '', '', '', NULL, '6'),
(2, 'ffffffRRGHHHHeeuuu', '', '', '', '', NULL, '6'),
(3, '', '', '', '', '', NULL, ''),
(4, '', '', '', '', '', NULL, ''),
(5, NULL, '', NULL, NULL, NULL, NULL, '6');

-- --------------------------------------------------------

--
-- Table structure for table `prevoid_management`
--

CREATE TABLE `prevoid_management` (
  `id` int(11) NOT NULL,
  `service` varchar(50) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `intended_void_date` varchar(50) DEFAULT NULL,
  `starter_pack_available` varchar(50) DEFAULT NULL,
  `void_tips` varchar(50) DEFAULT NULL,
  `bed` varchar(50) DEFAULT NULL,
  `mattress` varchar(50) DEFAULT NULL,
  `side_table` varchar(50) DEFAULT NULL,
  `wardrobe` varchar(50) DEFAULT NULL,
  `desk_and_chair` varchar(50) DEFAULT NULL,
  `curtains` varchar(50) DEFAULT NULL,
  `lamps` varchar(50) DEFAULT NULL,
  `keys_and_spare` varchar(50) DEFAULT NULL,
  `funiture_comments` text DEFAULT NULL,
  `cooker` varchar(50) DEFAULT NULL,
  `fridge_freezer` varchar(50) DEFAULT NULL,
  `washing_machine` varchar(50) DEFAULT NULL,
  `microwave` varchar(50) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `cleaning_needed` varchar(50) DEFAULT NULL,
  `deep_cleaning_needed` varchar(50) DEFAULT NULL,
  `bedroom` varchar(50) DEFAULT NULL,
  `bathroom` varchar(50) DEFAULT NULL,
  `kitchen` varchar(50) DEFAULT NULL,
  `others` varchar(50) DEFAULT NULL,
  `system_info` varchar(50) DEFAULT NULL,
  `last_modified_by` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `white_goods` varchar(50) DEFAULT NULL,
  `flooring` varchar(50) DEFAULT NULL,
  `outdoors_areas` varchar(50) DEFAULT NULL,
  `cleaning_comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `creator_id` varchar(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `risk_accessment_plan`
--

INSERT INTO `risk_accessment_plan` (`id`, `risk_accessment_plan_id`, `name`, `assessment_date`, `next_assessment_date`, `rap_id`, `type_of_risk`, `description_of_risk`, `risk_triggers`, `mitigating_factors`, `plan`, `who_needs_to_know`, `created_by`, `last_modified`, `creator_id`, `status`) VALUES
(1, '566', 'ggggg', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(2, '505500', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(3, '5000', 'iiiii', '', '', '', '', '', '', '', '', '', '', '', '6', ''),
(4, '5000', '', '', '', '', '', '', '', '', '', '', '', '', '2', 'delete'),
(5, '5000', '', '', '', '', '', '', '', '', '', '', '', '', '2', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `room_checks`
--

CREATE TABLE `room_checks` (
  `id` int(11) NOT NULL,
  `service` varchar(50) DEFAULT NULL,
  `compiled_By` varchar(50) DEFAULT NULL,
  `staff_lead` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
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
  `no_e_bike_or_e_scooters_charged` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `creator_id` varchar(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `no_e_bike_or_e_scooters_charged` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `creator_id` varchar(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_check_report`
--

INSERT INTO `room_check_report` (`id`, `service`, `compiled_by`, `staff_lead`, `date`, `type`, `walls_in_good_condition`, `lights_and_switches_in_good_condition`, `curtains_and_rails_in_good_condition`, `electrical_sockets_in_good_condition`, `windows`, `windows_locks_restriction_in_place`, `fire_notices_are_posted`, `radiators_are_working_with_no_leaks`, `furniture_in_good_condition`, `no_sign_of_pest_contamination`, `floor_coverings_in_good_condition`, `bathroom_clean_and_in_working_order`, `kitchen_area_clean_and_tidy`, `overall_cleanliness_and_hygeine`, `bins_clean_and_tidy`, `beddings_clean`, `smoke_alarms_tested_and_working`, `carbon_monoxide_alarm_tested`, `evidence_of_battery_charger_used`, `start_date`, `start_time`, `end_date`, `end_time`, `session`, `communication_method`, `venue_of_session`, `no_e_bike_or_e_scooters_charged`, `notes`, `creator_id`, `status`) VALUES
(1, 'hhhgogffdtyykjjffjddjbdsdogo', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(2, 'uufffo', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', 'delete');

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
  `creator_id` varchar(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_check_daily_report`
--

INSERT INTO `service_check_daily_report` (`id`, `service`, `compiled_by`, `staff_lead`, `date`, `escape_route`, `fire_warning_indicator`, `emergency_lightning_good`, `extinguishers_fire_fighters`, `flammable_material_secure`, `evidence_of_used_battery_charger`, `kitchen_is_clean_and_tidy`, `cooker_Extractor_in_good_condition`, `floor_are_non_slip_and_dry`, `adequate_handwashing_facilities`, `food_waste_in_suitable_containers`, `food_stored_in_suitable_containers`, `fridge_and_freezers_are_working`, `floor_stairways_and_corridor_clear`, `floors_are_free_from_trailing_wires`, `floor_converings_in_good_condition`, `secure_handrails_and_stairways`, `bathroom_clean_and_working`, `running_water`, `maintenance_hours_reported`, `refuse_collected_store_correctly`, `creator_id`, `status`) VALUES
(1, 'rerttre', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(2, 'rrrhjrrriejejj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(3, 'eee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(4, '{\"service\":\"rerttre\",\"action_1\":\"dderrrrrfdgfgg er', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(5, 'rrrhjrrriejejj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(6, 'rrrhjrrriejejj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(7, 'rrrhjrrriejejj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL);

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
  `creator_id` varchar(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_check_monthly_report`
--

INSERT INTO `service_check_monthly_report` (`id`, `door_seals_and_self_closing_devices`, `internal_self_closing_firedoors`, `emergency_lightning_function`, `evidence_of_used_battery_charger`, `washing_machine_filter_cleaned`, `water_dispenser_drip_trays_cleaned`, `auto_hold_open_freeswing_doors_fitted`, `sample_water_temperature_test`, `no_smoking_sign_displayed`, `furniture_complaints_updated_closed`, `completed_repairs_updated_closed`, `add_decoration_to_maintainance`, `portal_appliances_tested_accurately`, `kitchen_is_clean_tidy`, `cooker_extractor_in_good_condition`, `fridge_and_freezers_are_working`, `staff_have_sufficient_space`, `bins_are_emptied_regularly`, `desk_work_area_suitable`, `seat_lower_back_support`, `rooms_are_adequately_ventilated`, `photocopier_printer_in_good_condition`, `unused_water_outlet_flushed`, `showerheads_in_good_conditions`, `provision_disposal_of_sanitary_towels`, `cable_coverings_in_good_conditions`, `electrical_equipment_in_good_condition`, `electrical_sockets_in_good_condition`, `power_socket_not_overloaded`, `working_environment_satisfactory`, `chairs_in_good_condition_adjustable`, `coshh_cupboards_signed_locked`, `first_notice_and_posters`, `first_exit_and_other_signs_in_place`, `first_aid_arrangement_posters`, `employers_insurance_liability_shown`, `health_safety_law_poster_shown`, `items_are_safely_stored`, `entrance_exit_free_from_obstruction`, `entrance_area_in_good_condition`, `cctv_in_good_working_condition`, `box_location_1`, `no_of_guidance_leaflet_1`, `no_of_adhesive_dressings_1`, `no_of_adhesive_pads_with_bandage_1`, `no_of_wrapped_triangular_bandage_1`, `no_of_medium_dressings_1`, `no_of_large_dressings_1`, `no_of_safety_pins_1`, `box_location_2`, `no_of_guidance_leaflet_2`, `no_of_adhesive_dressings_2`, `no_of_adhesive_pads_with_bandage_2`, `no_of_wrapped_triangular_bandage_2`, `no_of_medium_dressings_2`, `no_of_large_dressings_2`, `no_of_safety_pins_2`, `no_of_moisture_cleaning_wipes`, `creator_id`, `status`) VALUES
(1, 'lllgrrrrrrgggffggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', 'delete'),
(2, 'grrrrrrgggffggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(3, 'ggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', NULL),
(4, 'ggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(5, 'ggggfggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(6, 'ggggfggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL);

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
  `creator_id` varchar(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_check_weekly_report`
--

INSERT INTO `service_check_weekly_report` (`id`, `smoke_alarm_tested_and_working`, `fire_alarm_points_system_working`, `carbon_monoxide_alarm_tested`, `charging_indicator_on_emergency_lighting`, `evidence_of_used_battery_charger`, `washing_machine_filter_cleaned`, `water_filter_in_staff_office_changed`, `charcoal_filter_changed_to_ovenhob`, `unneccesary_combustible_material`, `ventilations_are_not_obstructed`, `lightning_levels_are_adequate`, `lights_are_working_satisfactorily`, `line_filter_in_tumble_dryer_cleaned`, `kitchen_is_clean_tidy`, `cooker_extractor_in_good_condition`, `fridge_and_freezers_are_working`, `staff_have_sufficient_space`, `desk_work_area_suitable`, `seat_lower_back_support`, `unused_water_outlet_flushed`, `showerheads_in_good_conditions`, `provision_disposal_of_sanitary_towels`, `cable_coverings_in_good_conditions`, `electrical_equipment_in_good_condition`, `electrical_sockets_in_good_condition`, `power_socket_not_overloaded`, `working_environment_satisfactory`, `chairs_good_condition_adjustable`, `coshh_cupboards_signed_and_locked`, `first_aid_arrangement_posters`, `employers_insurance_liability_shown`, `health_safety_law_poster_shown`, `entrance_exit_free_from_obstruction`, `entrance_area_in_good_condition`, `drains_and_water_pipes_working`, `cctv_in_working_conditions`, `no_item_to_start_fire`, `refuse_collected_store_correctly`, `security_lightning_is_working`, `box_location_1`, `no_of_guidance_leaflet_1`, `no_of_adhesive_dressings_1`, `no_of_adhesive_pads_with_bandage_1`, `no_of_wrapped_triangular_bandage_1`, `no_of_medium_dressings_1`, `no_of_large_dressings_1`, `no_of_safety_pins_1`, `box_location_2`, `no_of_guidance_leaflet_2`, `no_of_adhesive_dressings_2`, `no_of_adhesive_pads_with_bandage_2`, `no_of_wrapped_triangular_bandage_2`, `no_of_medium_dressings_2`, `no_of_large_dressings_2`, `no_of_safety_pins_2`, `no_of_moisture_cleaning_wipes`, `creator_id`, `status`) VALUES
(1, 'ggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(2, 'jjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(3, 'wwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(4, 'ggggwwwwjjnbbbbeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(6, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(7, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(8, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(9, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL),
(10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(34, 6, '1c48fb28984d6a34f9096bc47e2021012bc270df8ced34a72026cfe8271f6493', '2024-08-12 01:03:08'),
(35, 1, 'b83c6f841337d62bb0d544aa30cabc90189bca4ddd23f1e33bfee0bc156ef5ac', '2024-08-28 00:53:58'),
(36, 1, 'ce06a99aae325719d3ec9deb3028b406aac4ccfd3d73b8685e906b8f67fed7f0', '2024-08-28 00:57:15'),
(37, 1, '71f63492e1b3e8b44e65b17f197672ef1752ce86a197ee16fb805cb2965c76fa', '2024-08-28 01:22:57'),
(38, 1, '9811b35f8d884e964f34c0e2fb29c9a4c140ea492c04b54ada1bc092b7516a9d', '2024-08-28 01:27:23'),
(39, 1, 'c35c6a5257e2786897ec194f3a2823c994f0b8aefa524d73a9fb1f9e236d90d7', '2024-08-28 01:28:01'),
(40, 1, '9d1517613d6acbbc445ec98ca37060d6773f5d40e12ced674f9e7d60844bc136', '2024-08-28 01:31:46'),
(41, 1, '61535512affbab0c3101cf8919b41f61feb949be4721b87529748499390ea506', '2024-08-28 01:57:29'),
(42, 1, '07af50afd97a511aac28787042d89976a97d04b8571c09715f5e6a1b9c7f51c3', '2024-08-28 02:08:15'),
(43, 1, 'c86e0a7317842db22a4cd32a5a2f2667ca9b7ae2a97618df169af82ecae33734', '2024-08-28 10:16:18'),
(44, 1, '7b02ff5c109704a0ff6ab4bfdf584c12247d216730d1d4b84c50f8cb574c83c0', '2024-08-28 11:16:42'),
(45, 1, 'f4eee08b6c2bb833ddf157955dc83a584f4ff5af0c8a3a3ce6409703f81a8f04', '2024-08-28 13:02:30'),
(46, 1, '4371445f82c3bd5e06f4519090b1020503be13f6ea246977e471a609c8ffce4b', '2024-08-28 13:07:44'),
(47, 1, 'c2e4003fa1d9e503be8107fda29ea9bb03cdb6e8800aae20ac8e88481252d834', '2024-08-28 13:14:40'),
(48, 1, '526eb8defd25deaaff2f9ffb4369683d206c4b7e4660c65ac0b8237dc826c558', '2024-08-28 13:17:25'),
(49, 1, '0e62b21b339575478cbbe15b080cbc7d29dacd55e62df96e2963af6953785fb3', '2024-08-28 13:18:59'),
(50, 1, '3ddfa5083a694a8929bd16a992a1e9ba05ae60ceaad29d9412c7d6828697a424', '2024-08-28 13:20:15'),
(51, 1, '3e4ed99dc5060f428299349eeb070febed4f1c93efa33d2fe83d9157a8679ea7', '2024-08-28 13:21:32'),
(52, 1, 'ee3661a52fa2f603b2caeabc552611eea2e307647a46ef6a0afb0003a08b8965', '2024-08-28 13:22:33'),
(53, 1, '6d9b41ed1e043fe5e5d585812cc1635820fe6cdb551738da8ab870f263bc77c4', '2024-08-28 13:24:27'),
(54, 1, '0a33b6fd02370b1f8ad1b025d631e7539bbea90a81b0d4dd1c57a5b8919b5be2', '2024-08-28 13:26:51'),
(55, 1, '81f048297ddfb79a97d587ef21d7ff3697a15e3a34d501d86d84042ad9fedd04', '2024-08-28 13:28:02'),
(56, 1, '85ebb402e33cb44071a504f985515cecfc028768b306797f989d5a3d4f540620', '2024-08-28 13:32:06'),
(57, 1, '0b13b1e59e11bdb3711cd4b351f62eaf5e6a157001159adabcc4eefbb3d447e1', '2024-08-28 13:34:35'),
(58, 1, '9f201e831213a9e63854e10830f2c325b1010ea8b6ce6448963aaeda7bdb7073', '2024-08-28 13:35:49'),
(59, 1, '4ea58ed83878db4df34d7d5a509bbed0125febc7089e8b87493177bd52c8feb8', '2024-08-28 13:43:21'),
(60, 1, '66815b2bc073df951544c57d97dea26d1cc62516a31a59adaffcaa1e8ee94108', '2024-08-28 13:45:20'),
(61, 1, '28b65c8419b44fb4284c705e869067ab4de3a50240655aafc691c4a868411746', '2024-08-28 13:49:16'),
(62, 1, '75aac9effc2372aa490e3a9da9dee1e00d2340352e35c10c53c7db8b879b0e79', '2024-08-28 13:50:18'),
(63, 1, 'ecc282ef553b23c64d7a00dac353edffb86746d23ef8ee2fd2cc9de161a6d6af', '2024-08-28 13:52:44'),
(64, 1, '5c7e0661a9aa7d9ce593d8058cde67f9a95492d4163c7ef71b5fa6b421db318e', '2024-08-28 13:53:21'),
(65, 1, '6090f06ad83072f2df97838633cb806dac989d06bbca5cdf2fdff9e99622616d', '2024-08-28 14:41:21'),
(66, 1, '4435416be1f98a0d31ee7460d673dfa6392ce074a185139c9375b6cf55c94621', '2024-08-28 14:42:12'),
(67, 1, 'cb59077dd2a577c38e4256988ef1211401894e1e2c006c4ce0ddf405621b9b74', '2024-08-28 14:44:08'),
(68, 1, '7045c8342dd127575d33416842e03e49657682bc5ba1849a870a5268ed11aae4', '2024-08-28 14:47:25'),
(69, 1, 'dea7698946e132dc0c219554ae4779278123fbd7c9ead735f241ab261642ba40', '2024-08-28 14:50:18'),
(70, 1, 'c97736a5ec528d46dce05deb4b51408aab8259d5599c19aec967732e497d52f9', '2024-08-28 14:52:51'),
(71, 1, '4ce601e2f6d4a7fba11664f1c0c3c69c16ba63102e5d7d1f22ad633619e145a3', '2024-08-28 14:58:14'),
(72, 1, 'a7cdf50177fea3fe2fa5fa7df051449ff6c9988f24604c243dda98ca82a06969', '2024-08-28 15:05:03'),
(73, 1, '45bbfd1bcf683c2f9fe942ff08ac1d2598c86b17d429aa55146a96316257d109', '2024-08-28 15:10:05'),
(74, 1, '4e91e408be80aa8db24f5835d06a18b8845e1faf3ed2e0f8761299e87ac09476', '2024-08-28 15:12:16'),
(75, 1, 'e59508ef65687996e7d82158847060f28f456d279d9b01dc447970f35b93c175', '2024-08-28 15:14:12'),
(76, 1, 'eb05d8dcd634c80e505fbbb86dca656bde974edc060d9223abb5a6df4b3ba5bb', '2024-08-28 15:42:38'),
(77, 1, '6738b6d2b7ca3c018c84b01b00a8b99557e2003d22462a649f7f5fb3cf8d9b15', '2024-08-28 16:05:03'),
(78, 1, '253d52dfcb68e4f42d26e646e0910e4d9ff6acd724109addcea6821f72a4e739', '2024-08-28 16:21:10'),
(79, 1, 'cca2c3c3ad7482cd1c4a94aefa440c828171a5ea66ea293f5483b5804496459c', '2024-08-28 16:25:02'),
(80, 1, '3c5049768841283040006d944d66b478dbdafb837459094824d63375be214c30', '2024-08-28 16:25:31'),
(81, 1, '28ab391bec79856aed3837bd64d88724f128912a9a9b386d20ef1920b6c7cae0', '2024-08-28 16:26:39'),
(82, 1, 'f1aefa4fe97f90e3f73f3f6b1e34392a7b07a6483775f86595ab66bb90e01404', '2024-08-28 16:32:00'),
(83, 1, 'd390330b3ae462b414ab18bb69eb87d00def322ebad1c49278922e9e567a443a', '2024-08-28 16:43:55'),
(84, 1, '17168f8dec78d43a6cabc9abc6bd750e85800384e8b6eff458954d54a1aef9e3', '2024-08-29 16:53:43'),
(85, 1, 'c165ce857cc686c7bde1424d332f64680ccf67fd6d9774844bfab5f58e5bc339', '2024-08-29 16:54:32'),
(86, 1, '35eae14fe5f38ffd45fe24ae44204658aa2ef1739902efdec0f61ebf0a4f47a0', '2024-08-29 17:06:05'),
(87, 1, '98a29235780c0389e998e5b2a7926b490e801448a357bdcbd62880df7b3272e5', '2024-08-29 18:28:58'),
(88, 1, '8484a17ef3d6eb2c1da19219cdae415b9d4c63d8720c1deaa6f3bd86ad1c68de', '2024-08-29 18:29:03'),
(89, 1, '58c3a333a0d0c6c2a0a8b082e68b2bcde7cd44905ac7f21ea4793101a53c1456', '2024-08-29 18:37:52'),
(90, 1, '87516216f127aea11be28bb10abed82b01303b11159620647ac4a7bdfa93de2e', '2024-08-29 18:37:57'),
(91, 1, '9d1ad97d44a405e6b25352fc29aeb20fc47ab9419af743daaf3fe7657d1b0a12', '2024-08-29 18:49:09'),
(92, 1, '237a6823b7b4973fa874ed3deebb0668c277a4f7a92e85526e3b28f7fa05fc71', '2024-08-29 18:49:11'),
(93, 1, '644aab5855cb6c5244268068d111a21095b36eaebc95e82766e5020df2ad2802', '2024-08-29 18:50:23'),
(94, 1, '597486774cbc3092fb5e1626acf69494a20d18ec9e58dac6a31ba2ed2a25ca0c', '2024-08-29 18:50:28'),
(95, 1, '4290679bb860fb5356e73d3b8dc6c5c3d04795980933f2a9e0ca5be1e134406c', '2024-08-29 18:54:46'),
(96, 1, 'dae26cf84ec9035d072582f4979a4a17b8c9751c0505efb20dbf6277b230e0a7', '2024-08-29 18:54:53'),
(97, 1, '8a35234256586da32cf524d8d0bfc64d78cea301f6f15ad3acd8891029f518f4', '2024-08-29 19:00:19'),
(98, 1, '56160832ff6acadbb4474e611245d958312466aceaab3b98c147ee657c724587', '2024-08-29 19:00:59'),
(99, 1, '985c60fdbcf16685127061d82701ce64e3c7bfa30d08c25cf14b14db5e7a5a64', '2024-08-29 19:01:14'),
(100, 1, 'c58fbe25a87269a8030463ec05c49514d37509403b5d8d4430d9f3748eaa2cb9', '2024-08-29 19:02:28'),
(101, 1, '127fd71c91b67a2717da4be584b9db969e6b4f67c9e5d0ef9ed5ecdb80bcb001', '2024-08-29 19:02:32'),
(102, 1, '1b13567160f99b8945ce2a51e0aaf3d66db1c8e0baa4f50494319600a6ab0942', '2024-08-29 19:03:04'),
(103, 1, '114c29b0f0396ee6006631078cbbb5a35160bdee7067e855186936f21ee05c8d', '2024-08-29 19:03:04'),
(104, 1, '4c12ff6e888e1cb446b56dc223025af4220bf2dd54748c084934699061c5e4c1', '2024-08-29 19:03:10'),
(105, 1, '6bf7022912a1d9f59938c4a4aad9cd573c4ca8de78c11364c1ac028837cd5068', '2024-08-29 19:03:11'),
(106, 1, '1be60d187118d9320df5a82aa8e810ff3151ee7f24542dbb0ec95ded04e8677f', '2024-08-29 19:03:18'),
(107, 1, '12f5872adfc82338ab54e145a099179a008302e3bf850f35de129ac8ffa8f5e3', '2024-08-29 19:03:20'),
(108, 1, '7547d879d66f55ea2e1d77690f63e1b9ed16f08030e3ab41212df1ef5a8c5774', '2024-08-29 19:03:32'),
(109, 1, 'ec7087b5779fa5cb6aa8191e91e3a93cb503775bc900a4f0e594b5933bc168b5', '2024-08-29 19:03:36'),
(110, 1, '1835e717351e857c1404e02022662f5e3123ab4ae178d2d0f723299dcc1e195e', '2024-08-29 19:04:20'),
(111, 1, 'a9721ebdbd186c2465ae9ccd97789dd3dd4ec6eb0ed35a39dcf436e2b4a97bdb', '2024-08-29 19:04:21'),
(112, 1, '6e6a8cb8a5b15061c4de656ed2612dd2e3a59984d7e4c3ef0afeab843758ba7a', '2024-08-29 19:05:13'),
(113, 1, '354419dcfe39ced47fc73ac989edc11860fdb00b1680b1fd2ea634f9dd5d07ff', '2024-08-29 19:05:14'),
(114, 1, '1987c9c445e826c6919dbf431188921c58bcda9579c7aa440ae8e3779370a371', '2024-08-29 19:05:20'),
(115, 1, 'becd7ed0a0bcf9724ebe1a1e362d2f5ca0e25a4af7713fd1ba8d400bd21c2508', '2024-08-29 19:05:23'),
(116, 1, 'c1d1b0143b0ca6017d4a0bc4b46e96b0c0f42096eef55dcd19681d028a71345e', '2024-08-29 19:06:14'),
(117, 1, 'f1c7fc323aef3de741e7d562b5aa29c417d3af70d11866c4c1ed3170e377e4a7', '2024-08-29 19:06:19'),
(118, 1, '3221c79771f4a2c714d7ef535a6e591a49105b0e9c459a29a381a8c7aa19de54', '2024-08-29 19:06:42'),
(119, 1, 'ad7d679b748a82099a38f09f7db15cdb117afbf56b6ff688d403c9836424766c', '2024-08-29 19:06:44'),
(120, 1, 'd26f1519c15354b38c0dbc8f632da82c7208fc8e70eedbbd17def417f387a123', '2024-08-29 19:09:45'),
(121, 1, 'dff5dbda99dc1c3acc56a808884a4c8987bdb0b40f25b94648eb7a7a8dcb0cd5', '2024-08-29 19:09:46'),
(122, 1, '0bbbd5f4001004d90f748fce492d2e951f6fb9996e3e6347e4c224a88788ed82', '2024-08-29 19:10:39'),
(123, 1, '13b8bf62ca831f7d710d6fb952b17573668a408b4d7e7f1dd13694ac16cff2f9', '2024-08-29 19:10:41'),
(124, 1, '3ca8794418cafeff365a8a75b6e65ad00e676deaabac9bdf3579758d978c3562', '2024-08-29 19:13:08'),
(125, 1, 'aaac5e0d7c553c9b154edbd4bc23951fb765fce4789541d969149eb2f0515292', '2024-08-29 19:13:10'),
(126, 1, '50ff5e2568cef1640a12f483b74433ff7453a7fe78c691e4cc93d1dff4447cfe', '2024-08-29 19:15:55'),
(127, 1, 'cf348c21ca59aa5ec0dd00d87457b9623fa41f12d70b4da26abff27a6b77bfde', '2024-08-29 19:16:01'),
(128, 1, '07a1f9c8e423b79554b6df01997b623997306795532cc3ccb825dba21ed86577', '2024-08-29 19:16:09'),
(129, 1, '1f1923cf899a51e660b8aca50554d4a3ee14483df12ed643f8fed8d05cc14514', '2024-08-29 19:16:10'),
(130, 1, 'f60d3a371246e9d3e4b278908e51023e37ac605b21c3b7bb40f26fc632856045', '2024-08-29 19:17:40'),
(131, 1, 'afcf765dba592f3e1a3439830b7fcda8810255b46318ac52f2da9059e47974ca', '2024-08-29 19:17:42'),
(132, 1, 'c35766bf833254025774f6cff79fb64459c96c1ca59e699406cbdb4f6f2b5867', '2024-08-29 19:17:47'),
(133, 1, '8cac5b7403a0c47c80815992e52ce425d932974d11c3da1ae3b3e42821926083', '2024-08-29 19:17:47'),
(134, 1, 'b3cfdd529cdb53db345178494fa438a3af3056c501bcf98e1b39bf92e0f769db', '2024-08-29 19:19:47'),
(135, 1, '29988aa3989f44b071f1ba9e4b96ce655c2a1fe4abd3fbb8c83984d5dec3b6e7', '2024-08-29 19:19:48'),
(136, 1, 'a61955c164614e51cb38d84d5bd49088ae29aebbf7490ae0830b8ac7c258b11d', '2024-08-29 19:26:57'),
(137, 1, '23beb9abdd475e248440050fa4433a1470526bbaf78ec016926c193116ef9ddd', '2024-08-29 19:27:03'),
(138, 1, '0275f1d6d4e83284d52840d50872470948b3a237dc0c397c4e4bfe28d37b46dd', '2024-08-29 19:27:11'),
(139, 1, '09152f28d9bb9b91067cb19fe8f2a0ded20798c3a5205836d69efee27bc8a34c', '2024-08-29 19:27:16'),
(140, 1, 'fa9d21d522311ddd0c0c07f7b87c97cf5b900d4545d2b14eabc71be667788d35', '2024-08-29 19:27:24'),
(141, 1, 'cdbfa13f8186215be09b75691121c54d55ece0658f7344a3df94f28bc031bea3', '2024-08-29 19:28:18'),
(142, 1, '205dc9e9912c26f132e3790c7c4546ae14f6865610db5ea40d71dfb2efc5b776', '2024-08-29 19:28:33'),
(143, 1, '5e5e082f3878816fe2224a721855c4961ebb4c2fe5cf8eaa7742df0d6982201b', '2024-08-29 19:29:16'),
(144, 1, 'a1b64b1262f9c1250b1d398a19492e0e0607a6450493099a5b8dbd67e9007f5f', '2024-08-29 19:29:52'),
(145, 1, '080bbec270a931d2a78989c03493556af45f23346e384921bd0dda19576feab6', '2024-08-29 19:32:57'),
(146, 1, '0649dc2051b170ef200c9d9861be00f62cc2e6e3d7130ddcb651dd2141014540', '2024-08-29 19:33:31'),
(147, 1, '23ffd8b5a0e0118826c8a2ec7baf505057bffcd648b5db93e22cef1c31497f57', '2024-08-29 19:33:40'),
(148, 1, '22a38df9a717a20b285d8636cea4fe100c06d600931ed3b0769aabeb28754b3d', '2024-08-29 19:34:44'),
(149, 1, 'ba642ad111c2ede9440884c35b1b450da3c5252e0b7d1fb80c2f9a96eec42c88', '2024-08-29 19:35:14'),
(150, 1, '0bd1869a72a71a726bfe3836d790d3780423ee2608b9bad9d99206c1deba8687', '2024-08-29 19:43:19'),
(151, 1, '24641bec30fa442ec9e45a71b4dd171bdb7caa7a889e54483d66934de97bc413', '2024-08-29 19:44:31'),
(152, 1, '9b84f4689d13e01fa6e75d4237187a9a73a55715e27debe65689f25160731702', '2024-08-29 19:45:43'),
(153, 1, '5147f9cb83227bc571ea74792a7891bd2fb6ec5727798fa58cafc79a7a5301bf', '2024-08-29 19:47:08'),
(154, 1, '162653f005ef2af86317b9b6d1b7e8cd0f93011c874aceb5d53758c118e641c7', '2024-08-29 19:49:24'),
(155, 1, 'c473a37d28cfd67ae60ceb5c9aafe996ae5af97d9ce68c64f66faba429a6b2b9', '2024-08-29 19:56:50'),
(156, 1, '6a2925bfbdfdf219ee0131a0717c14392ec43a92d6eef6508bfec49687273b66', '2024-08-29 19:58:11'),
(157, 1, '961827b61a9d75666bf4acf715dac047d256011c372f20edf283de28eec99192', '2024-08-29 19:59:56'),
(158, 1, '316e1012dec29c862b4a79e81965476b32a3b67068e256632205bc62a70d7cc5', '2024-08-29 20:01:22'),
(159, 1, 'b013b83070164c7d2942cdcc98d0a8f6cf53a50d0c7f3c6b50c96aa4b1e07e0d', '2024-08-29 20:01:27'),
(160, 1, '35c3c80e998bdd85f0c8ccb690a7bf06956f3b951799ccd1c75ce87aefeaa257', '2024-08-29 20:04:24'),
(161, 1, '411792f50d377335e28a915fc68acff46a9dff698d40f9a73fe126539c4d8265', '2024-08-29 20:06:14'),
(162, 1, '11f02e6aa853111eef298f26110499b7bcca5ebd71c3b62935b85331f0901517', '2024-08-29 20:06:15'),
(163, 1, '98befdc2a73e3ab3307b7987d62810c380e111f9cac93fd020ed32e9918f3480', '2024-08-29 20:12:19'),
(164, 1, 'ca343985be6afd388535fb35a49602133d413b9d2e1cc8417216151080bf64a1', '2024-08-29 20:12:34'),
(165, 1, '0fad60cbc2c997d8b495044323d51468b5a8e68bef6929f156424e8bc795e5fc', '2024-08-29 20:12:36'),
(166, 1, 'baa5d1487166f111f670d0ce7680d1c9156d7d941cf12f011b0d755711a40f43', '2024-08-29 20:12:41'),
(167, 1, '4bd6455f0d5ae79d9b3a4375d570ab3957cf3a3b01037fc5656261e72d3be463', '2024-08-29 20:12:43'),
(168, 1, 'ae1079254a03c46ac3c0dd2f806d39d30e746527c0bf13a52c515e887aa0260c', '2024-08-29 20:12:52'),
(169, 1, 'e0e7ee49db35c28dd4053feb82b68bee526931b6cceca80f25b65c67c68eca2f', '2024-08-29 20:12:53'),
(170, 1, '5ceb29fe52f1651e14b39a10e0c95f3f688d2900a62dea7a894cd1d965513ae4', '2024-08-29 20:14:02'),
(171, 1, '7ed6cb7f67cc421bae4cd64755be5d5911d2db0e4a12678028040cecdccd4cbb', '2024-08-29 20:14:04'),
(172, 1, '1b6b78d489174ec9d8bbc235bdaa60edcedfcf0ed409344cda8fa899b9cd61f2', '2024-08-29 20:15:30'),
(173, 1, '4a07e6aade100c574aed762c7605ede74998d28fc9509ce01201b9e8723fce96', '2024-08-29 20:15:31'),
(174, 1, '0e9bd8d477d71472879427ee6e7f4cc2d084bb8f38c53628e7eb46b70d6af932', '2024-08-29 20:16:45'),
(175, 1, 'c9df724521cb3b18c38c4badda2f7b16d52558e191c8a831674361c66d958111', '2024-08-29 20:17:46'),
(176, 1, 'c56670cb3b9e20238a1d5fe7bd566670f947ce6d0dfd7d53a364bbd60e38c058', '2024-08-29 20:20:25'),
(177, 1, '2f7e3b1d243ae0f1cd9cd89bd1cddda2c10560d92db79a8431f62150cf4e9386', '2024-08-29 20:21:21'),
(178, 1, 'ee26680a846cd5fe97cda7050893dd35167859e39ad4efe7bc6759d59165ba78', '2024-08-29 20:24:10'),
(180, 1, '534e7177ea80eb7dd3ef65403e46592ffa774eac2bea81bd93f849f5d46bfa37', '2024-08-29 20:24:16'),
(182, 1, '8612923bcf3ea804655561706c26efd9648aa65654d752c0107a5e1ff3439a92', '2024-08-29 20:25:03'),
(184, 1, 'e8d5f6418a03a20586dc3e1d991996e633d66c36f530a2471eae7efc476434c9', '2024-08-29 20:26:32'),
(186, 1, '7a6fa59008a89572381cf2afea3aaf7aec377bd94548a27134eaac1bf675d508', '2024-08-29 20:26:59'),
(188, 1, 'de6b422ccaaf1e124a0ee3d4601f2b1b2192746916eaf9e514146987d233822b', '2024-08-29 20:29:10'),
(190, 1, '84e084627a595bd374c5b50826d3a8f305b64e0b99ec563e8edafdde8e7e79ef', '2024-08-29 20:30:16'),
(192, 1, 'a74ece83e432ff6301db3810294db625bc81a64a6087010047d4322848a2079a', '2024-08-29 20:31:47'),
(194, 1, '1268b16412264a9ed84ebdc7f2dee97eee1d1645e46c95b6b9b4eff4c0b50fea', '2024-08-29 20:31:58'),
(196, 1, '77aa065e077069bb67e261260d28d2014db2d3930f211ae30f0efa6b971540e0', '2024-08-29 20:32:17'),
(198, 1, '353f9ca9cd95325223f58b5e93d72abc22d3170c9a7ec84c79df9a15540ff884', '2024-08-29 20:33:36'),
(201, 1, '6ba5e519b8aaf23c8f598020da8d264a72ba5dc24f7bc40472c4b1bdd5d75543', '2024-08-29 21:04:16'),
(203, 1, 'c0094637fa754fb21b07176bc17659514cd431b15d2abfa868da494530cf1639', '2024-08-29 21:04:23'),
(206, 1, '915fbe57dc604894c6cc674651de7789f8b7dcf6887137c42ff695353cd5c1bb', '2024-08-29 21:05:34'),
(208, 1, 'ffdb83cff5bad4537b1b1e2bde4eb69b1306ecffb5afdf13fccc030ccc399908', '2024-08-29 21:06:01'),
(210, 1, '26b82a4fb0b44924ff27d3e8656260ae8861b6e2075b79d22a0e175685293f5d', '2024-08-29 21:07:12'),
(211, 1, '3a8cff043a390d87c5313af982a0734690ad9bc3e9dc064f1c0216897798cd8c', '2024-08-29 21:07:15'),
(212, 1, '3aed8795bf1c2df16ae6624092a6f66e2942d26c7191744c8aebe3eace5a65e2', '2024-08-29 21:07:16'),
(214, 1, '43ba0998c89397632c15b5907583b062519f1119e594d2491486b6a8578a3db3', '2024-08-30 08:41:48'),
(218, 1, '76badd20d241ef5d47e0c734013343f2297855a57e885351b3add8c0d1f695bc', '2024-08-30 08:43:44'),
(222, 1, '23eb0f18892f809ccba5db6c456f58d646c801080b659c36f15cb03d00970295', '2024-08-30 08:47:32'),
(230, 1, '815393a4cc3cdfea0e03dd50134b2c59992c2313c4be56fb41aceaad26b6118a', '2024-08-30 11:27:36'),
(251, 1, '1c252e33f0d4a7590afdfc40669000defdc4d98193cf33291f65abe52c47326b', '2024-08-30 12:40:34'),
(252, 1, '2fd1b8abdda18da9eaf3d996081cfaa70f89363fdf755b84ac92bf4e3b5e666b', '2024-08-30 12:40:34'),
(253, 1, '3879fda74543d9ed487b4570594ec946379a8c760c2dc295c56170d7fc15d89b', '2024-08-30 12:40:36'),
(254, 1, '16268b1501858be9a0118337d39da548c0dda96fa2b41fdf3e282bb7b71aa21d', '2024-08-30 12:40:37'),
(255, 1, '911c9fbecf074e61782b81a5c38ca8c5ecc80742b5223b370e796cf5a1bca480', '2024-08-30 12:40:38'),
(256, 1, 'c6408af2a937c9af6a81b45fde544d4bd1e2020b508b1481304b933febfe94b3', '2024-08-30 12:40:38'),
(257, 1, '946dbc8af9030988a68c3e6ac2d2fccd2beb14a2fa089d9a49858a7979ba28b5', '2024-08-30 12:40:39'),
(258, 1, '5c1b086ca4b22b958bcb7a200061c0e8ddcc6d95a81f2bb73f68ed92d94c8666', '2024-08-30 12:40:40'),
(259, 1, 'ac60097afd34ea94282449a7ee6687bac75eac801f78998ce9c15daa2b07d01b', '2024-08-30 12:40:40'),
(260, 1, 'a10516e8130a129496d2c847618148c307246daccf67e6cea2da20c039a3d88b', '2024-08-30 12:40:42'),
(261, 1, 'fc97eb1e51d0a30a90fc5e960ba6511c69d054c5b413643dcdd8a19811eeda35', '2024-08-30 12:40:42'),
(262, 1, '1355b0fc74dd731db1664ed08af2b707ed67d6e13265e8bf20e16f6ce93a76ce', '2024-08-30 12:40:42'),
(263, 1, '29ffe2414a0598ef847a52c203c97e1fad4f6ba29406d4a7525458af83e0447c', '2024-08-30 12:40:43'),
(264, 1, 'c91d5654d9ec5d2fae3869bfd8f745e7b3c91c18b4e4d8a25329822600ffaef7', '2024-08-30 12:40:43'),
(265, 1, 'd6cab40812568ec24aabb96014ecd9ae5a89f8344bb843bd247f5d5a535b62b0', '2024-08-30 12:40:43'),
(266, 1, '607367ce13800212fdd2ab46a1c1eaf9a5a0a1b6781ad6dba42e583ec7c0efc0', '2024-08-30 12:40:44'),
(267, 1, '5af08d591a089b3535d5c1d12d61fb19cb4027e7c62ea305d088cd5c3c8ee360', '2024-08-30 12:40:45'),
(268, 1, '6808eef20ef6e923fbd212e64c777f2421a456351b51fd059e55ab3a6afc3f5c', '2024-08-30 12:40:46'),
(269, 1, 'c962d88329221a430055b9296e5c6387f3651158aab43bfc9f4a09eff4e75a8f', '2024-08-30 12:40:46'),
(270, 1, '0b5e4fe2f2d27c121726f112fffbd16182195fd3ddad09705f123aa00de6bd77', '2024-08-30 12:40:50'),
(271, 1, 'f506d29216a7d421e5055fd89f8c979b40e288305eb3e0d1f925317067b1e6ef', '2024-08-30 12:40:51'),
(272, 1, '0fb55e55e1899ec31443f65bcc10aa74436768312249c5bdd69d4de27cc17b55', '2024-08-30 12:40:51'),
(273, 1, 'ac1ae5736701c49f12ba8baad7c43bc55243429a907b5f4cf3967c7405123303', '2024-08-30 12:40:51'),
(274, 1, 'd73d198f22a92eb30a0a58c08413948ce973a948019898d9fc5564e191496e2b', '2024-08-30 12:40:52'),
(275, 1, 'fe60f06334f6eef7e00d913afb6cc861720dd18097f5e1ebeb45ea8c5a7a7521', '2024-08-30 12:40:52'),
(343, 6, '9eed1b74b68c84d926289349e96aad7521015d8b4a5d580d0536c8ffb0592cec', '2024-08-31 03:51:16'),
(348, 6, '0cd7717e292c9cdaff6839d5e3c286463681b15afef5338391c7556b00e0a09f', '2024-08-31 14:14:53'),
(352, 6, '090ccf7e42035bb113d6da2bc895a373e2797277ebf2cd46c7dac8778f741773', '2024-08-31 18:43:28'),
(355, 6, '6daf9d1e2049145ea5ca240320c816bbf198ab692668b7ca03ef0d56b85e6573', '2024-09-01 01:14:41'),
(361, 6, '8ecc29ad74a27f2bfdeab00c1b78e644c8fe4c8aaa0ce5419025b8b5beefe5dd', '2024-09-01 17:09:29'),
(362, 6, 'b5336e87a1f9d744cb379931cde1834300faf0300a3858c1d39c62ef5b035306', '2024-09-01 22:48:21'),
(363, 1, 'de807685df91c5bf7134cb704ff60ad782563676caeb7be45ba3fe96a1be8ed6', '2024-09-02 00:56:20'),
(364, 1, 'aee503b5e5a99071849ca7909065267724cda5bb3f5525b4da2270d897e13163', '2024-09-02 04:02:39'),
(372, 6, '576d16228f2391b5ffdcad8d9ccbcb3e3c158486a1fe8bb84eecb23809b3031c', '2024-09-07 10:49:32'),
(376, 1, '42be90f9146d9d0da61d2e3f72ea5c21635b0836a877e751799f4d0f0e740e37', '2024-09-07 23:41:35');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `status`) VALUES
(1, 'methyl2007', '$2y$10$DoNmXQNZmJpwuZnnxzxoR.jW5mkmlez4vDLPjo/B3VrsFsBPV2OWO', 'admin', ''),
(6, 'adepoju', '$2y$10$DoNmXQNZmJpwuZnnxzxoR.jW5mkmlez4vDLPjo/B3VrsFsBPV2OWO', 'user', ''),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `case_note`
--
ALTER TABLE `case_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id`
--
ALTER TABLE `id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident_report`
--
ALTER TABLE `incident_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medication_report`
--
ALTER TABLE `medication_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prevoid_management`
--
ALTER TABLE `prevoid_management`
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
-- Indexes for table `room_checks`
--
ALTER TABLE `room_checks`
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
-- AUTO_INCREMENT for table `case_note`
--
ALTER TABLE `case_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `id`
--
ALTER TABLE `id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incident_report`
--
ALTER TABLE `incident_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medication_report`
--
ALTER TABLE `medication_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prevoid_management`
--
ALTER TABLE `prevoid_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `room_checks`
--
ALTER TABLE `room_checks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

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
