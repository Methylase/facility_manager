<?php
require_once 'Connection.php';

class User extends Connection {
    /*public function register_service_worker_as_user($username, $password, $role) {

        try {
            $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
            $stmt->execute(['username' => $username]);

            if ($stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'Username already exists'];
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare('INSERT INTO users (username, password, role) VALUES (:username, :password, :role)');
            $stmt->execute(['username' => $username, 'password' => $hashedPassword, 'role' => $role]);

            return ['status' => 'success', 'message' => 'Porter registered successfully'];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        }
    }*/

    public function login($username, $password) {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'] )) {
                $token = bin2hex(random_bytes(32));
                $expires_at = date('Y-m-d H:i:s', strtotime('+1 hour'));
                if ($user['status'] =='delete') {
                    return ['status' => 'error', 'message' => 'Unauthorized'];
                }
                $stmt = $this->pdo->prepare('INSERT INTO tokens (user_id, token, expires_at) VALUES (:user_id, :token, :expires_at)');
                $stmt->execute([
                    'user_id' => $user['id'],
                    'token' => $token,
                    'expires_at' => $expires_at
                ]);

                return ['status' => 'success', 'token' => $token, 'user'=>$username, 'role' => $user['role']];
                //return ['status' => 'success', 'data'=>['token' => $token, 'user'=>$username, 'role' => $user['role']]];
            } else {
                return ['status' => 'error', 'message' => 'Invalid username or password'];
            } 
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        }
         
    }
    
    public function validateToken($token) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM tokens WHERE token = :token AND expires_at > NOW()'); 
            $stmt->execute(['token' => $token]); 
            $tokenData = $stmt->fetch(PDO::FETCH_ASSOC); 
            if ($tokenData) { 
                $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = :user_id');
                $stmt->execute(['user_id' => $tokenData['user_id']]); 
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                return $user ? ['status' => 'success','role'=>$user['role'], 'token'=>$tokenData['token'], 'creator_id'=>$user['id']] : ['status' => 'error', 'message' => 'Invalid user']; 
            } else { 
                return ['status' => 'error', 'message' => 'Unauthorized']; 
            } 
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    }

    public function post_service_profile(
        $service_code,
        $service,
        $ress,
        $phone_number,
        $landline,
        $emergency_number,
        $service_type,
        $number_of_beds,
        $specialization,
        $service_manager,
        $deputy_manager,
        $on_call_1,
        $on_call_2,
        $gender,
        $age_range,
        $duration_of_stay,
        $lone_working,
        $challenging_behavior,
        $personal_care_support,
        $physical_challenge,
        $sleep_in_bed,
        $parking,
        $pets,
        $unpaid_breaks,
        $created_by,
        $creator_id
    ) 
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM service_profile WHERE service_code = :service_code');
            $stmt->execute(['service_code' => $service_code]);

            if ($stmt->fetch(PDO::FETCH_ASSOC)) {
                return [ 'error_name'=>'service_code', 'message' => 'Service code already exist'];
             }

            $stmt = $this->pdo->prepare('INSERT INTO service_profile (service_code, service, ress, phone_number,
                landline, emergency_number, service_type, number_of_beds, specialization, service_manager,
                deputy_manager, on_call_1, on_call_2, gender, age_range, duration_of_stay, lone_working,
                challenging_behavior, personal_care_support, physical_challenge, sleep_in_bed, parking,
                pets, unpaid_breaks, created_by ,creator_id ) VALUES (:service_code, :service, :ress, :phone_number,
                :landline, :emergency_number, :service_type, :number_of_beds, :specialization, :service_manager,
                :deputy_manager, :on_call_1, :on_call_2, :gender, :age_range, :duration_of_stay, :lone_working,
                :challenging_behavior, :personal_care_support, :physical_challenge, :sleep_in_bed, :parking,
                :pets, :unpaid_breaks, :created_by, :creator_id)');
                $stmt->execute(['service_code'=>$service_code, 'service'=>$service, 'ress'=>$ress, 'phone_number'
                =>$phone_number,'landline'=>$landline, 'emergency_number' =>$emergency_number, 'service_type'=>$service_type, 
                'number_of_beds'=>$number_of_beds, 'specialization'=>$specialization, 'service_manager'=>$service_manager,
                'deputy_manager'=>$deputy_manager, 'on_call_1'=>$on_call_1, 'on_call_2'=>$on_call_2, 'gender'=>$gender, 
                'age_range'=>$age_range, 'duration_of_stay'=>$duration_of_stay, 'lone_working'=>$lone_working, 
                'challenging_behavior'=> $challenging_behavior, 'personal_care_support'=>$personal_care_support, 
                'physical_challenge'=>$physical_challenge, 'sleep_in_bed'=>$sleep_in_bed, 'parking'=>$parking, 
                'pets'=>$pets, 'unpaid_breaks'=>$unpaid_breaks, 'created_by'=>$created_by, 'creator_id'=> $creator_id
            ]);

            return ['status' => 'success', 'message' => 'New service profile registered successfully'];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        }
    }

    public function get_all_service_profile() { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM service_profile WHERE status IS NULL');
            $stmt->execute(); 
            $get_all_service_profile = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => 'success','data'=>$get_all_service_profile]; 
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    } 
    
        
    public function get_service_profile($id) { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM service_profile WHERE status IS NULL AND id = :id');
            $stmt->execute(['id' => $id]); 
            $get_service_profile= $stmt->fetch(PDO::FETCH_ASSOC);
            if($get_service_profile){  
                return ['status' => 'success','data'=>$get_service_profile]; 
               
            }
            return ['status' => 'error', 'message' => 'No service profile record for this '.$id];
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    }    

    public function update_service_profile(
        $service_code,
        $service,
        $ress,
        $phone_number,
        $landline,
        $emergency_number,
        $service_type,
        $number_of_beds,
        $specialization,
        $service_manager,
        $deputy_manager,
        $on_call_1,
        $on_call_2,
        $gender,
        $age_range,
        $duration_of_stay,
        $lone_working,
        $challenging_behavior,
        $personal_care_support,
        $physical_challenge,
        $sleep_in_bed,
        $parking,
        $pets,
        $unpaid_breaks,
        $created_by,
        $id
    ) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM service_profile WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this update'];
             }
            $stmt = $this->pdo->prepare("UPDATE service_profile SET service_code='$service_code', service='$service', 
            ress='$ress', phone_number='$phone_number', landline='$landline', emergency_number='$emergency_number', 
            service_type='$service_type', number_of_beds='$number_of_beds', specialization='$specialization', 
            service_manager='$service_manager', deputy_manager='$deputy_manager', on_call_1='$on_call_1', 
            on_call_2='$on_call_2', gender='$gender', age_range='$age_range', duration_of_stay='$duration_of_stay', 
            lone_working='$lone_working', challenging_behavior='$challenging_behavior', personal_care_support='$personal_care_support', 
            physical_challenge='$physical_challenge', sleep_in_bed='$sleep_in_bed', parking='$parking', 
            pets='$pets', unpaid_breaks='$unpaid_breaks', created_by='$created_by' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Service profile updated successfully']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this update'];
        } 
    }     

    public function delete_service_profile($id) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM service_profile WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this delete'];
            }
            $stmt = $this->pdo->prepare("UPDATE service_profile SET status='delete' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Service profile successfully deleted']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    }     

    public function post_young_people_profile(
        $contact_type,
        $phone_number,
        $email,
        $mailing_ress,
        $country,
        $city,
        $postal_code,
        $contact_emergency,
        $nationality,
        $first_language,
        $immigration_status,
        $immigration_doc_held,
        $last_entry_date,
        $care_level,
        $training,
        $education,
        $hobbies,
        $reasons_not_edu_training,
        $occupation,
        $length_of_unemployment,
        $height,
        $eye_color,
        $hair_color_n_style,
        $distinguishing_feature,
        $cloth_usually_worn,
        $death,
        $plan_name,
        $service_name,
        $accessment_date,
        $next_accessment_date,
        $any_historic_details,
        $date,
        $end_date,
        $category,
        $concerns_mornitoring,
        $take_further_actions,
        $notes,
        $created_by,
        $creator_id
        ) {
            try {
                $stmt = $this->pdo->prepare('SELECT * FROM young_people_profile WHERE email = :email');
                $stmt->execute(['email' => $email]);
    
                if ($stmt->fetch(PDO::FETCH_ASSOC)) {
                    return [ 'error_name'=>'service_code', 'message' => 'Email already exist'];
                 }
    
                $stmt = $this->pdo->prepare('INSERT INTO young_people_profile (
                contact_type, phone_number, email, mailing_ress, country, city, postal_code, contact_emergency,
                nationality, first_language, immigration_status, immigration_doc_held, last_entry_date, care_level,
                training, education, hobbies, reasons_not_edu_training, occupation, length_of_unemployment, height,
                eye_color, hair_color_n_style, distinguishing_feature, cloth_usually_worn, death, plan_name, service_name,
                accessment_date, next_accessment_date, any_historic_details, date, end_date, category, concerns_mornitoring,
                take_further_actions, notes, created_by, creator_id ) VALUES (:contact_type, :phone_number, :email, :mailing_ress, 
                :country, :city, :postal_code, :contact_emergency, :nationality, :first_language, :immigration_status, 
                :immigration_doc_held, :last_entry_date, :care_level, :training, :education, :hobbies, :reasons_not_edu_training, 
                :occupation, :length_of_unemployment, :height, :eye_color, :hair_color_n_style, :distinguishing_feature, 
                :cloth_usually_worn, :death, :plan_name, :service_name, :accessment_date, :next_accessment_date, :any_historic_details, 
                :date, :end_date, :category, :concerns_mornitoring, :take_further_actions, :notes, :created_by, :creator_id)');
                $stmt->execute(['contact_type'=>$contact_type, 'phone_number'=>$phone_number, 'email'=>$email, 'mailing_ress'=>$mailing_ress, 
                'country'=>$country, 'city'=>$city, 'postal_code'=>$postal_code, 'contact_emergency'=>$contact_emergency, 'nationality'=>$nationality,
                'first_language'=>$first_language, 'immigration_status'=>$immigration_status, 'immigration_doc_held'=>$immigration_doc_held, 
                'last_entry_date'=>$last_entry_date, 'care_level'=>$care_level, 'training'=>$training, 'education'=>$education, 'hobbies'=>$hobbies, 
                'reasons_not_edu_training'=>$reasons_not_edu_training, 'occupation'=>$occupation, 'length_of_unemployment'=>$length_of_unemployment, 
                'height'=>$height, 'eye_color'=>$eye_color, 'hair_color_n_style'=>$hair_color_n_style, 'distinguishing_feature'=>$distinguishing_feature, 
                'cloth_usually_worn'=>$cloth_usually_worn, 'death'=>$death, 'plan_name'=>$plan_name, 'service_name'=>$service_name, 'accessment_date'=>$accessment_date, 
                'next_accessment_date'=>$next_accessment_date, 'any_historic_details'=>$any_historic_details, 'date'=>$date, 'end_date'=>$end_date, 'category'=>$category, 
                'concerns_mornitoring'=>$concerns_mornitoring, 'take_further_actions'=>$take_further_actions, 'notes'=>$notes, 'created_by'=>$created_by, 'creator_id'=>$creator_id
                ]);
    
                return ['status' => 'success', 'message' => 'New young people profile registered successfully'];
            } catch (PDOException $e) {
                return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
            }
        }  
        
        public function get_all_young_people_profile() { 
            try { 
    
                $stmt = $this->pdo->prepare('SELECT * FROM young_people_profile WHERE status IS NULL');
                $stmt->execute(); 
                $get_all_young_people_profile = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return ['status' => 'success','data'=>$get_all_young_people_profile]; 
                
            } catch (PDOException $e) { 
                return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
            } 
        }  

        public function get_young_people_profile($id) { 
            try { 
    
                $stmt = $this->pdo->prepare('SELECT * FROM young_people_profile WHERE status IS NULL AND id = :id');
                $stmt->execute(['id' => $id]); 
                $get_young_people_profile = $stmt->fetch(PDO::FETCH_ASSOC);
                if($get_young_people_profile){  
                    return ['status' => 'success','data'=>$get_young_people_profile]; 
                   
                }
                return ['status' => 'error', 'message' => 'No young people profile record for this '.$id];
                
            } catch (PDOException $e) { 
                return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
            } 
        }         


        public function update_young_people_profile(
            $contact_type,
            $phone_number,
            $email,
            $mailing_ress,
            $country,
            $city,
            $postal_code,
            $contact_emergency,
            $nationality,
            $first_language,
            $immigration_status,
            $immigration_doc_held,
            $last_entry_date,
            $care_level,
            $training,
            $education,
            $hobbies,
            $reasons_not_edu_training,
            $occupation,
            $length_of_unemployment,
            $height,
            $eye_color,
            $hair_color_n_style,
            $distinguishing_feature,
            $cloth_usually_worn,
            $death,
            $plan_name,
            $service_name,
            $accessment_date,
            $next_accessment_date,
            $any_historic_details,
            $date,
            $end_date,
            $category,
            $concerns_mornitoring,
            $take_further_actions,
            $notes,
            $created_by,
            $id
        ) { 
            try { 
                $stmt = $this->pdo->prepare('SELECT * FROM young_people_profile WHERE id = :id');
                $stmt->execute(['id' => $id]);
    
                if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                    return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this update'];
                 }
                $stmt = $this->pdo->prepare("UPDATE young_people_profile SET contact_type='$contact_type', phone_number='$phone_number', email='$email', 
                mailing_ress='$mailing_ress', country='$country', city='$city', postal_code='$postal_code', contact_emergency='$contact_emergency', 
                nationality='$nationality', first_language='$first_language', immigration_status='$immigration_status', immigration_doc_held='$immigration_doc_held', 
                last_entry_date='$last_entry_date', care_level='$care_level', training='$training', education='$education', hobbies='$hobbies', 
                reasons_not_edu_training='$reasons_not_edu_training', occupation='$occupation', length_of_unemployment='$length_of_unemployment', height='$height', 
                eye_color='$eye_color', hair_color_n_style='$hair_color_n_style', distinguishing_feature='$distinguishing_feature', cloth_usually_worn='$cloth_usually_worn', 
                death='$death', plan_name='$plan_name', service_name='$service_name', accessment_date='$accessment_date', next_accessment_date='$next_accessment_date', 
                any_historic_details='$any_historic_details', date='$date', end_date='$end_date', category='$category', concerns_mornitoring='$concerns_mornitoring', 
                take_further_actions='$take_further_actions', notes='$notes', created_by='$created_by' WHERE id='$id'");
                $stmt->execute();
                return ['status' => 'success','message'=>'Young people profile profile updated successfully']; 
          
                
            } catch (PDOException $e) { 
                return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
            } 
        } 
        

        public function delete_young_people_profile($id) { 
            try { 
                $stmt = $this->pdo->prepare('SELECT * FROM young_people_profile WHERE id = :id');
                $stmt->execute(['id' => $id]);
    
                if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                    return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this delete'];
                }
                $stmt = $this->pdo->prepare("UPDATE young_people_profile SET status='delete' WHERE id='$id'");
                $stmt->execute();
                return ['status' => 'success','message'=>'Young people profile successfully deleted']; 
          
                
            } catch (PDOException $e) { 
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this delete'];
            } 
        } 
        
        
        public function post_service_worker_profile(
            $username, 
            $password, 
            $role,
            $firstname,
            $lastname,
            $email,
            $phone_number,
            $ress,
            $profile_image,
            $created_by,
            $creator_id
        ) {
            try {
                $stmt = $this->pdo->prepare('SELECT * FROM service_worker_profile WHERE email = :email');
                $stmt->execute(['email' => $email]);
    
                if ($stmt->fetch(PDO::FETCH_ASSOC)) {
                    return [ 'error_name'=>'service_code', 'message' => 'Email already exist'];
                }

                
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $this->pdo->prepare('INSERT INTO users (username, password, role) VALUES (:username, :password, :role)');
                $stmt->execute(['username' => $username, 'password' => $hashedPassword, 'role' => $role]);
                $own_user_id = $this->pdo->lastInsertedId();   

                $stmt = $this->pdo->prepare('INSERT INTO service_worker_profile (
                firstname, lastname, email, phone_number, ress, profile_image, 
                created_by, user_id, creator_id) VALUES (:firstname, :lastname, :email, 
                :phone_number, :ress, :profile_image, :created_by, :user_id, :creator_id)');
                $stmt->execute(['firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email,
                'phone_number'=>$phone_number, 'ress'=>$ress, 'profile_image'=>$profile_image, 
                'created_by'=>$created_by,'own_user_id'=>$own_user_id,'creator_id'=>$creator_id
                ]);
    
                return ['status' => 'success', 'message' => 'New service worker profile registered successfully'];
            } catch (PDOException $e) {
                return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
            }
        }   
        
        public function get_all_service_worker_profile() { 
            try { 
    
                $stmt = $this->pdo->prepare('SELECT * FROM service_worker_profile WHERE status IS NULL');
                $stmt->execute(); 
                $get_all_service_worker_profile = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return ['status' => 'success','data'=>$get_all_service_worker_profile]; 
                
            } catch (PDOException $e) { 
                return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
            } 
        }    
        
    
        public function get_service_worker_profile($id) { 
            try { 
    
                $stmt = $this->pdo->prepare('SELECT * FROM service_worker_profile WHERE status IS NULL AND id = :id');
                $stmt->execute(['id' => $id]); 
                $get_service_worker_profile = $stmt->fetch(PDO::FETCH_ASSOC);
                if($get_service_worker_profile){  
                    return ['status' => 'success','data'=>$get_service_worker_profile]; 
                   
                }
                return ['status' => 'error', 'message' => 'No service worker profile record for this '.$id];
                
            } catch (PDOException $e) { 
                return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
            } 
        }        

        public function update_service_worker_profile(
            $firstname,
            $lastname,
            $email,
            $phone_number,
            $ress,
            $profile_image,
            $created_by,
            $id
        ) { 
            try { 
                $stmt = $this->pdo->prepare('SELECT * FROM service_worker_profile WHERE id = :id');
                $stmt->execute(['id' => $id]);
    
                if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                    return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this update'];
                 }
                $stmt = $this->pdo->prepare("UPDATE service_worker_profile SET firstname='$firstname', 
                lastname='$lastname', email='$email', phone_number='$phone_number', ress='$ress',
                profile_image='$profile_image', created_by='$created_by'  WHERE id='$id'");
                $stmt->execute();
                return ['status' => 'success','message'=>'service worker  profile updated successfully']; 
          
                
            } catch (PDOException $e) { 
                return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
            } 
        } 

        public function delete_service_worker_profile($id) { 
            try { 
                $stmt = $this->pdo->prepare('SELECT * FROM service_worker_profile WHERE id = :id');
                $stmt->execute(['id' => $id]);
    
                if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                    return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this delete'];
                }

                $user=$stmt->fetch(PDO::FETCH_ASSOC);
                $own_user_id = $user['own_user_id'];
                $stmt = $this->pdo->prepare("UPDATE users SET status='delete' WHERE 'id'='$own_user_id'");
                $stmt->execute();

                $stmt = $this->pdo->prepare("UPDATE service_worker_profile SET status='delete' WHERE 'id'='$id'");
                $stmt->execute();
                return ['status' => 'success','message'=>'Young people profile successfully deleted']; 
          
                
            } catch (PDOException $e) { 
                return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
            } 
        } 

        public function post_incident_report(
            $police_involve,
            $fire_brigade_involved,
            $ambulance_involved,
            $details_of_emergency_survive_involved,
            $involved_external_person,
            $names_of_external_person,
            $social_service_involved,
            $cmht_involved,
            $other_external_services_involved,
            $names_of_other_external_services_involved,
            $date_of_incident,
            $time_of_incident,
            $is_this_serious_incident,
            $your_cause_of_concern_about_yp_yps_child,
            $what_is_the_sub_category_of_your_cause_of_concern,
            $want_to_monitor_concern,
            $is_yp_in_significant_harm,
            $do_you_want_to_take_further_action,
            $is_yp_aware_that_you_will_contact_external_agencies,
            $if_no_enter_brief_outline_otherwise_write_n_a,
            $allegations_suspension_of_substance_abuse,
            $witness_es_statements_need_to_be_taken_down,
            $has_a_manager_been_informed,
            $has_a_marac_referral_been_made,
            $i_a_of_marac_refferal,
            $created_by,
            $last_modified,
            $start_date,
            $start_time,
            $end_date,
            $end_time,
            $session,
            $communication_method,
            $venue_of_session,
            $notes,
            $creator_id
        ) {
            try {
                

                $stmt = $this->pdo->prepare('INSERT INTO incident_report (
                police_involve, fire_brigade_involved, ambulance_involved, details_of_emergency_survive_involved,
                involved_external_person, names_of_external_person, social_service_involved, cmht_involved,
                other_external_services_involved, names_of_other_external_services_involved, date_of_incident,
                time_of_incident, is_this_serious_incident, your_cause_of_concern_about_yp_yps_child,
                what_is_the_sub_category_of_your_cause_of_concern, want_to_monitor_concern, is_yp_in_significant_harm,
                do_you_want_to_take_further_action, is_yp_aware_that_you_will_contact_external_agencies, 
                if_no_enter_brief_outline_otherwise_write_n_a, allegations_suspension_of_substance_abuse, 
                witness_es_statements_need_to_be_taken_down, has_a_manager_been_informed, has_a_marac_referral_been_made,
                i_a_of_marac_refferal, created_by, last_modified, start_date, start_time, end_date, end_time, session,
                communication_method, venue_of_session, notes, creator_id) VALUES (:police_involve, :fire_brigade_involved, 
                :ambulance_involved, :details_of_emergency_survive_involved, :involved_external_person, :names_of_external_person, 
                :social_service_involved, :cmht_involved, :other_external_services_involved, :names_of_other_external_services_involved, 
                :date_of_incident, :time_of_incident, :is_this_serious_incident, :your_cause_of_concern_about_yp_yps_child,
                :what_is_the_sub_category_of_your_cause_of_concern, :want_to_monitor_concern, :is_yp_in_significant_harm,
                :do_you_want_to_take_further_action, :is_yp_aware_that_you_will_contact_external_agencies, 
                :if_no_enter_brief_outline_otherwise_write_n_a, :allegations_suspension_of_substance_abuse, 
                :witness_es_statements_need_to_be_taken_down, :has_a_manager_been_informed, :has_a_marac_referral_been_made,
                :i_a_of_marac_refferal, :created_by, :last_modified, :start_date, :start_time, :end_date, :end_time, :session,
                :communication_method, :venue_of_session, :notes, :creator_id)');
                $stmt->execute(['police_involve'=>$police_involve, 'fire_brigade_involved'=>$fire_brigade_involved, 
                'ambulance_involved'=>$ambulance_involved, 'details_of_emergency_survive_involved'=>$details_of_emergency_survive_involved,
                'involved_external_person'=>$involved_external_person, 'names_of_external_person'=>$names_of_external_person, 
                'social_service_involved'=>$social_service_involved, 'cmht_involved'=>$cmht_involved,
                'other_external_services_involved'=>$other_external_services_involved, 
                'names_of_other_external_services_involved'=>$names_of_other_external_services_involved, 
                'date_of_incident'=>$date_of_incident,'time_of_incident'=>$time_of_incident, 'is_this_serious_incident'=>$is_this_serious_incident, 
                'your_cause_of_concern_about_yp_yps_child'=>$your_cause_of_concern_about_yp_yps_child,
                'what_is_the_sub_category_of_your_cause_of_concern'=>$what_is_the_sub_category_of_your_cause_of_concern, 
                'want_to_monitor_concern'=>$want_to_monitor_concern, 'is_yp_in_significant_harm'=>$is_yp_in_significant_harm,
                'do_you_want_to_take_further_action'=>$do_you_want_to_take_further_action, 
                'is_yp_aware_that_you_will_contact_external_agencies'=>$is_yp_aware_that_you_will_contact_external_agencies, 
                'if_no_enter_brief_outline_otherwise_write_n_a'=>$if_no_enter_brief_outline_otherwise_write_n_a, 
                'allegations_suspension_of_substance_abuse'=>$allegations_suspension_of_substance_abuse, 
                'witness_es_statements_need_to_be_taken_down'=>$witness_es_statements_need_to_be_taken_down, 
                'has_a_manager_been_informed'=>$has_a_manager_been_informed, 'has_a_marac_referral_been_made'=>$has_a_marac_referral_been_made,
                'i_a_of_marac_refferal'=>$i_a_of_marac_refferal, 'created_by'=>$created_by, 'last_modified'=>$last_modified, 
                'start_date'=>$start_date, 'start_time'=>$start_time, 'end_date'=>$end_date, 'end_time'=>$end_date, 'session'=>$session,
                'communication_method'=>$communication_method, 'venue_of_session'=>$venue_of_session, 'notes'=>$notes, 'creator_id'=>$creator_id
                ]);
    
                return ['status' => 'success', 'message' => 'New incident report registered successfully'];
            } catch (PDOException $e) {
                return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
            }
        }   
             
        public function get_all_incident_report() { 
            try { 
    
                $stmt = $this->pdo->prepare('SELECT * FROM incident_report WHERE status IS NULL');
                $stmt->execute(); 
                $get_all_incident_report = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return ['status' => 'success','data'=>$get_all_incident_report]; 
                
            } catch (PDOException $e) { 
                return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
            } 
        }
        
        public function get_incident_report($id) { 
            try { 
    
                $stmt = $this->pdo->prepare('SELECT * FROM incident_report WHERE status IS NULL AND id = :id');
                $stmt->execute(['id' => $id]); 
                $get_incident_report= $stmt->fetch(PDO::FETCH_ASSOC);
                if($get_incident_report){  
                    return ['status' => 'success','data'=>$get_incident_report]; 
                   
                }
                return ['status' => 'error', 'message' => 'No incident record for this '.$id];
                
            } catch (PDOException $e) { 
                return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
            } 
        }         
        
        public function update_incident_report(
            $police_involve,
            $fire_brigade_involved,
            $ambulance_involved,
            $details_of_emergency_survive_involved,
            $involved_external_person,
            $names_of_external_person,
            $social_service_involved,
            $cmht_involved,
            $other_external_services_involved,
            $names_of_other_external_services_involved,
            $date_of_incident,
            $time_of_incident,
            $is_this_serious_incident,
            $your_cause_of_concern_about_yp_yps_child,
            $what_is_the_sub_category_of_your_cause_of_concern,
            $want_to_monitor_concern,
            $is_yp_in_significant_harm,
            $do_you_want_to_take_further_action,
            $is_yp_aware_that_you_will_contact_external_agencies,
            $if_no_enter_brief_outline_otherwise_write_n_a,
            $allegations_suspension_of_substance_abuse,
            $witness_es_statements_need_to_be_taken_down,
            $has_a_manager_been_informed,
            $has_a_marac_referral_been_made,
            $i_a_of_marac_refferal,
            $created_by,
            $last_modified,
            $start_date,
            $start_time,
            $end_date,
            $end_time,
            $session,
            $communication_method,
            $venue_of_session,
            $notes,
            $id
        ) { 
            try { 
                $stmt = $this->pdo->prepare('SELECT * FROM incident_report WHERE id = :id');
                $stmt->execute(['id' => $id]);
    
                if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                    return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this update'];
                 }
                $stmt = $this->pdo->prepare("UPDATE incident_report SET police_involve='$police_involve', fire_brigade_involved='$fire_brigade_involved', ambulance_involved
                ='$ambulance_involved', details_of_emergency_survive_involved='$details_of_emergency_survive_involved',involved_external_person='$involved_external_person',
                names_of_external_person='$names_of_external_person',social_service_involved='$social_service_involved',cmht_involved='$cmht_involved', other_external_services_involved
                ='$other_external_services_involved', names_of_other_external_services_involved='$names_of_other_external_services_involved', date_of_incident='$date_of_incident',
                time_of_incident='$time_of_incident', is_this_serious_incident='$is_this_serious_incident', your_cause_of_concern_about_yp_yps_child='$your_cause_of_concern_about_yp_yps_child',
                what_is_the_sub_category_of_your_cause_of_concern='$what_is_the_sub_category_of_your_cause_of_concern', want_to_monitor_concern='$want_to_monitor_concern',
                is_yp_in_significant_harm='$is_yp_in_significant_harm', do_you_want_to_take_further_action='$do_you_want_to_take_further_action',
                is_yp_aware_that_you_will_contact_external_agencies='$is_yp_aware_that_you_will_contact_external_agencies', if_no_enter_brief_outline_otherwise_write_n_a='$if_no_enter_brief_outline_otherwise_write_n_a',
                allegations_suspension_of_substance_abuse='$allegations_suspension_of_substance_abuse', witness_es_statements_need_to_be_taken_down='$witness_es_statements_need_to_be_taken_down',
                has_a_manager_been_informed='$has_a_manager_been_informed', has_a_marac_referral_been_made='$has_a_marac_referral_been_made', i_a_of_marac_refferal='$i_a_of_marac_refferal', created_by='$created_by',
                last_modified='$last_modified', start_date='$start_date', start_time='$start_time', end_date='$end_date', end_time='$end_time', session='$session', communication_method='$communication_method',
                venue_of_session='$venue_of_session', notes='$notes' WHERE id='$id'");
                $stmt->execute();
                return ['status' => 'success','message'=>'Incident report updated successfully']; 
          
                
            } catch (PDOException $e) { 
                return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
            } 
        }         

        public function delete_incident_report($id) { 
            try { 
                $stmt = $this->pdo->prepare('SELECT * FROM incident_report WHERE id = :id');
                $stmt->execute(['id' => $id]);
    
                if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                    return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this delete'];
                }
                $stmt = $this->pdo->prepare("UPDATE incident_report SET status='delete' WHERE id='$id'");
                $stmt->execute();
                return ['status' => 'success','message'=>'Incident report successfully deleted']; 
          
                
            } catch (PDOException $e) { 
                return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
            } 
        } 

        public function property_check_report(
            $property_checked_name,
            $type,
            $date_of_check,
            $time_of_check,
            $staff_lead,
            $staff_assistant,
            $yp_assisting_check,
            $service,
            $room,
            $location_notes,
            $start_date,
            $start_time,
            $end_date,
            $end_time,
            $session,
            $communication_method,
            $venue_of_session,
            $case_notes,
            $creator_id
        ){
            try {
                $stmt = $this->pdo->prepare('INSERT INTO property_check_report (
                property_checked_name, type, date_of_check, time_of_check,
                staff_lead, staff_assistant, yp_assisting_check, service, room,
                location_notes, start_date, start_time, end_date, end_time, session,
                communication_method, venue_of_session, case_notes, creator_id) 
                VALUES (:property_checked_name, :type, :date_of_check, :time_of_check,
                :staff_lead, :staff_assistant, :yp_assisting_check, :service, :room,
                :location_notes, :start_date, :start_time, :end_date, :end_time, :session,
                :communication_method, :venue_of_session, :case_notes, :creator_id)');
                $stmt->execute(['property_checked_name'=>$property_checked_name, 
                'type'=>$type, 'date_of_check'=>$date_of_check, 'time_of_check'=>$time_of_check,
                'staff_lead'=>$staff_lead, 'staff_assistant'=>$staff_assistant, 
                'yp_assisting_check'=>$yp_assisting_check, 'service'=>$service, 'room'=>$room,
                'location_notes'=>$location_notes, 'start_date'=>$start_date, 'start_time'=>$start_time, 
                'end_date'=>$end_date, 'end_time'=>$end_time, 'session'=>$session, 'communication_method'=>$communication_method, 
                'venue_of_session'=>$venue_of_session, 'case_notes'=>$case_notes, 'creator_id'=>$creator_id
                ]);

                return ['status' => 'success', 'message' => 'Property check report registered successfully'];
            } catch (PDOException $e) {
                return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
            }
        }      
    
    public function get_all_property_check_report() { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM property_check_report WHERE status IS NULL');
            $stmt->execute(); 
            $get_all_property_check_report = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => 'success','data'=>$get_all_property_check_report]; 
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    }   
    
    public function get_property_check_report($id) { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM property_check_report WHERE status IS NULL AND id = :id');
            $stmt->execute(['id' => $id]); 
            $get_property_check_report = $stmt->fetch(PDO::FETCH_ASSOC);
            if($get_property_check_report){  
                return ['status' => 'success','data'=>$get_property_check_report]; 
               
            }
            return ['status' => 'error', 'message' => 'No property check report record for this '.$id];
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    }    

    public function update_property_check_report(
        $property_checked_name,
        $type,
        $date_of_check,
        $time_of_check,
        $staff_lead,
        $staff_assistant,
        $yp_assisting_check,
        $service,
        $room,
        $location_notes,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $session,
        $communication_method,
        $venue_of_session,
        $case_notes,
        $id
    ) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM property_check_report WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this update'];
             }
            $stmt = $this->pdo->prepare("UPDATE property_check_report SET property_checked_name='$property_checked_name', type='$type',
            date_of_check='$date_of_check', time_of_check='$time_of_check', staff_lead='$staff_lead', staff_assistant='$staff_assistant',
            yp_assisting_check='$yp_assisting_check', service='$service', room='$room', location_notes='$location_notes',
            start_date='$start_date', start_time='$start_time', end_date='$end_date', end_time='$end_time', session='$session',
            communication_method='$communication_method', venue_of_session='$venue_of_session', case_notes='$case_notes' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Property check report updated successfully']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    } 
    
    public function delete_property_check_report($id) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM medication_report WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this delete'];
            }
            $stmt = $this->pdo->prepare("UPDATE medication_report SET status='delete' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'medication report successfully deleted']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    }     


    public function post_medication_report(
        $client,
        $date,
        $time,
        $is_medication_still_accurate,
        $list_yps_medication_below,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $session,
        $communication_method,
        $venue_of_session,
        $notes,
        $creator_id
    ){
        try {
            $stmt = $this->pdo->prepare('INSERT INTO medication_report (
            client, date, time, is_medication_still_accurate, list_yps_medication_below, 
            start_date, start_time, end_date, end_time, session,
            communication_method, venue_of_session, notes, creator_id) 
            VALUES (:client, :date, :time, :is_medication_still_accurate, 
            :list_yps_medication_below, :start_date, :start_time, :end_date, :end_time, 
            :session, :communication_method, :venue_of_session, :notes, :creator_id)');
            $stmt->execute(['client'=>$client, 'date'=>$date, 'time'=>$time,  'is_medication_still_accurate'=>$is_medication_still_accurate, 
            'list_yps_medication_below'=>$list_yps_medication_below, 'start_date'=>$start_date, 'start_time'=>$start_time, 
            'end_date'=>$end_date, 'end_time'=>$end_time, 'session'=>$session, 'communication_method'=>$communication_method, 
            'venue_of_session'=>$venue_of_session, 'notes'=>$notes, 'creator_id'=>$creator_id
            ]);

            return ['status' => 'success', 'message' => 'New medication report registered successfully'];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        }
    } 
    

    public function get_all_medication_report() { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM medication_report WHERE status IS NULL');
            $stmt->execute(); 
            $get_all_incident_report = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => 'success','data'=>$get_all_incident_report]; 
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    }


    public function get_medication_report($id) { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM medication_report WHERE status IS NULL AND id = :id');
            $stmt->execute(['id' => $id]); 
            $get_property_check_report = $stmt->fetch(PDO::FETCH_ASSOC);
            if($get_property_check_report){  
                return ['status' => 'success','data'=>$get_property_check_report]; 
               
            }
            return ['status' => 'error', 'message' => 'No medication report record for this '.$id];
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    }     


    public function update_medication_report(
        $client,
        $date,
        $time,
        $is_medication_still_accurate,
        $list_yps_medication_below,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $session,
        $communication_method,
        $venue_of_session,
        $notes,
        $id
    ) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM medication_report WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this update'];
             }
            $stmt = $this->pdo->prepare("UPDATE medication_report SET client='$client' ,date='$date',
            time='$time', is_medication_still_accurate='$is_medication_still_accurate', list_yps_medication_below='$list_yps_medication_below',
            start_date='$start_date', start_time='$start_time', end_date='$end_date', end_time='$end_time', session='$session',
            communication_method='$communication_method', venue_of_session='$venue_of_session', notes='$notes' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Medication report updated successfully']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    }  
    
    
    public function delete_medication_report($id) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM property_check_report WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this delete'];
            }
            $stmt = $this->pdo->prepare("UPDATE property_check_report SET status='delete' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Property check report successfully deleted']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    }  
    
    

    public function post_room_check_report(
        $service,
        $compiled_by, 
        $staff_lead,
        $date,
        $type,
        $walls_in_good_condition,
        $lights_and_switches_in_good_condition,
        $curtains_and_rails_in_good_condition,
        $electrical_sockets_in_good_condition,
        $windows,
        $windows_locks_restriction_in_place,
        $fire_notices_are_posted,
        $radiators_are_working_with_no_leaks,
        $furniture_in_good_condition,
        $no_sign_of_pest_contamination,
        $floor_coverings_in_good_condition,
        $bathroom_clean_and_in_working_order,
        $kitchen_area_clean_and_tidy,
        $overall_cleanliness_and_hygeine,
        $bins_clean_and_tidy,
        $beddings_clean,
        $smoke_alarms_tested_and_working,
        $carbon_monoxide_alarm_tested,
        $evidence_of_battery_charger_used,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $session,
        $communication_method,
        $venue_of_session,
        $notes,
        $creator_id
    ){
        try {
            

            $stmt = $this->pdo->prepare('INSERT INTO room_check_report (
                service, compiled_by, date, type, walls_in_good_condition, lights_and_switches_in_good_condition,
                curtains_and_rails_in_good_condition, electrical_sockets_in_good_condition, windows, windows_locks_restriction_in_place,
                fire_notices_are_posted, radiators_are_working_with_no_leaks, furniture_in_good_condition, no_sign_of_pest_contamination,
                floor_coverings_in_good_condition, bathroom_clean_and_in_working_order, kitchen_area_clean_and_tidy, overall_cleanliness_and_hygeine,
                bins_clean_and_tidy, beddings_clean, smoke_alarms_tested_and_working, carbon_monoxide_alarm_tested, evidence_of_battery_charger_used,
                start_date, start_time, end_date, end_time, session, communication_method, venue_of_session, notes, creator_id ) 
                VALUES ( :service, :compiled_by, :date, :type, :walls_in_good_condition, :lights_and_switches_in_good_condition,
                :curtains_and_rails_in_good_condition, :electrical_sockets_in_good_condition, :windows, :windows_locks_restriction_in_place,
                :fire_notices_are_posted, :radiators_are_working_with_no_leaks, :furniture_in_good_condition, :no_sign_of_pest_contamination,
                :floor_coverings_in_good_condition, :bathroom_clean_and_in_working_order, :kitchen_area_clean_and_tidy, :overall_cleanliness_and_hygeine,
                :bins_clean_and_tidy, :beddings_clean, :smoke_alarms_tested_and_working, :carbon_monoxide_alarm_tested, :evidence_of_battery_charger_used,
                :start_date, :start_time, :end_date, :end_time, :session, :communication_method, :venue_of_session, :notes, :creator_id)');
                $stmt->execute(['service'=>$service, 'compiled_by'=>$compiled_by, 'date'=>$date, 'type'=>$type, 'walls_in_good_condition'=>$walls_in_good_condition, 
                'lights_and_switches_in_good_condition'=>$lights_and_switches_in_good_condition, 'curtains_and_rails_in_good_condition'=>$curtains_and_rails_in_good_condition, 
                'electrical_sockets_in_good_condition'=>$electrical_sockets_in_good_condition, 'windows'=>$windows, 'windows_locks_restriction_in_place'=>$windows_locks_restriction_in_place,
                'fire_notices_are_posted'=>$fire_notices_are_posted, 'radiators_are_working_with_no_leaks'=>$radiators_are_working_with_no_leaks, 'furniture_in_good_condition'=>$furniture_in_good_condition, 
                'no_sign_of_pest_contamination'=>$no_sign_of_pest_contamination, 'floor_coverings_in_good_condition'=>$floor_coverings_in_good_condition, 'bathroom_clean_and_in_working_order'=>$bathroom_clean_and_in_working_order, 
                'kitchen_area_clean_and_tidy'=>$kitchen_area_clean_and_tidy, 'overall_cleanliness_and_hygeine'=>$overall_cleanliness_and_hygeine,'bins_clean_and_tidy'=>$bins_clean_and_tidy, 'beddings_clean'=>$beddings_clean,
                'smoke_alarms_tested_and_working'=>$smoke_alarms_tested_and_working, 'carbon_monoxide_alarm_tested'=>$carbon_monoxide_alarm_tested, 'evidence_of_battery_charger_used'=>$evidence_of_battery_charger_used, 
                'start_date'=>$start_date, 'start_time'=>$start_time, 'end_date'=>$end_date, 'end_time'=>$end_time, 'session'=>$session, 'communication_method'=>$communication_method, 'venue_of_session'=>$venue_of_session,
                'notes'=>$notes, 'creator_id'=>$creator_id
            ]);

            return ['status' => 'success', 'message' => 'New room check report registered successfully'];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        }
    }  
    
    
    public function get_all_room_check_report() { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM room_check_report WHERE status IS NULL');
            $stmt->execute(); 
            $get_all_room_check_report = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => 'success','data'=>$get_all_room_check_report]; 
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    }    


    public function get_room_check_report($id) { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM room_check_report WHERE status IS NULL AND id = :id');
            $stmt->execute(['id' => $id]); 
            $get_room_check_report= $stmt->fetch(PDO::FETCH_ASSOC);
            if($get_room_check_report){  
                return ['status' => 'success','data'=>$get_room_check_report]; 
               
            }
            return ['status' => 'error', 'message' => 'No room check report record for this '.$id];
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    }    
    
    
    public function update_room_check_report(
        $service,
        $compiled_by, 
        $staff_lead,
        $date,
        $type,
        $walls_in_good_condition,
        $lights_and_switches_in_good_condition,
        $curtains_and_rails_in_good_condition,
        $electrical_sockets_in_good_condition,
        $windows,
        $windows_locks_restriction_in_place,
        $fire_notices_are_posted,
        $radiators_are_working_with_no_leaks,
        $furniture_in_good_condition,
        $no_sign_of_pest_contamination,
        $floor_coverings_in_good_condition,
        $bathroom_clean_and_in_working_order,
        $kitchen_area_clean_and_tidy,
        $overall_cleanliness_and_hygeine,
        $bins_clean_and_tidy,
        $beddings_clean,
        $smoke_alarms_tested_and_working,
        $carbon_monoxide_alarm_tested,
        $evidence_of_battery_charger_used,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $session,
        $communication_method,
        $venue_of_session,
        $notes,
        $id
    ) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM room_check_report WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this update'];
             }
            $stmt = $this->pdo->prepare("UPDATE room_check_report SET service='$service', compiled_by='$compiled_by', date='$date',  type='$type', 
            walls_in_good_condition='$walls_in_good_condition', lights_and_switches_in_good_condition='$lights_and_switches_in_good_condition',
            curtains_and_rails_in_good_condition='$curtains_and_rails_in_good_condition', electrical_sockets_in_good_condition='$electrical_sockets_in_good_condition', 
            windows='$windows', windows_locks_restriction_in_place='$windows_locks_restriction_in_place', fire_notices_are_posted='$fire_notices_are_posted', 
            radiators_are_working_with_no_leaks='$radiators_are_working_with_no_leaks', furniture_in_good_condition='$furniture_in_good_condition', 
            no_sign_of_pest_contamination='$no_sign_of_pest_contamination', floor_coverings_in_good_condition='$floor_coverings_in_good_condition', 
            bathroom_clean_and_in_working_order='$bathroom_clean_and_in_working_order', kitchen_area_clean_and_tidy='$kitchen_area_clean_and_tidy', 
            overall_cleanliness_and_hygeine='$overall_cleanliness_and_hygeine', bins_clean_and_tidy='$bins_clean_and_tidy', beddings_clean='$beddings_clean', 
            smoke_alarms_tested_and_working='$smoke_alarms_tested_and_working', carbon_monoxide_alarm_tested='$carbon_monoxide_alarm_tested', 
            evidence_of_battery_charger_used='$evidence_of_battery_charger_used', start_date='$start_date', start_time='$start_time', end_date='$end_date', 
            end_time='$end_time', session='$session', communication_method='$communication_method', venue_of_session='$venue_of_session', notes='$notes' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Room check report updated successfully']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    } 
    

    public function delete_room_check_report($id) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM room_check_report WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this delete'];
            }
            $stmt = $this->pdo->prepare("UPDATE room_check_report SET status='delete' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Room check report successfully deleted']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    }   
    
    

    public function post_emergency_contract(
        $first_name,
        $last_name,
        $other_relationship_to_yp,
        $main_contact_number,
        $secondary_contact_number,
        $email,
        $address,
        $country_territory,
        $state,
        $street,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $session,
        $communication_method,
        $venue_of_session,
        $notes,
        $creator_id
    ){
        try {
            

            $stmt = $this->pdo->prepare('INSERT INTO emergency_contract (
            first_name, last_name, other_relationship_to_yp, main_contact_number,
            secondary_contact_number, email, address, country_territory, state,
            street, start_date, start_time, end_date, end_time, session,
            communication_method, venue_of_session, notes, creator_id) 
            VALUES (:first_name, :last_name, :other_relationship_to_yp, :main_contact_number,
            :secondary_contact_number, :email, :address, :country_territory, :state,
            :street, :start_date, :start_time, :end_date, :end_time, 
            :session, :communication_method, :venue_of_session, :notes, :creator_id)');
            $stmt->execute(['first_name'=>$first_name, 'last_name'=>$last_name, 
            'other_relationship_to_yp'=>$other_relationship_to_yp, 'main_contact_number'=>$main_contact_number,
            'secondary_contact_number'=>$secondary_contact_number, 'email'=>$email, 'address'=>$address, 
            'country_territory'=>$country_territory, 'state'=>$state,'street'=>$street, 'start_date'=>$start_date, 
            'start_time'=>$start_time, 'end_date'=>$end_date, 'end_time'=>$end_time, 'session'=>$session, 
            'communication_method'=>$communication_method, 'venue_of_session'=>$venue_of_session, 
            'notes'=>$notes, 'creator_id'=>$creator_id
            ]);

            return ['status' => 'success', 'message' => 'New emergency contract registered successfully'];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        }
    }  
    

    public function get_all_emergency_contract() { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM emergency_contract WHERE status IS NULL');
            $stmt->execute(); 
            $get_all_emergency_contract = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => 'success','data'=>$get_all_emergency_contract]; 
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    }    

    public function get_emergency_contract($id) { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM emergency_contract WHERE status IS NULL AND id = :id');
            $stmt->execute(['id' => $id]); 
            $get_emergency_contract= $stmt->fetch(PDO::FETCH_ASSOC);
            if($get_emergency_contract){  
                return ['status' => 'success','data'=>$get_emergency_contract]; 
               
            }
            return ['status' => 'error', 'message' => 'No emergency contract record for this '.$id];
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    } 
    
    
    public function update_emergency_contract(
        $first_name,
        $last_name,
        $other_relationship_to_yp,
        $main_contact_number,
        $secondary_contact_number,
        $email,
        $address,
        $country_territory,
        $state,
        $street,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $session,
        $communication_method,
        $venue_of_session,
        $notes,
        $id
    ) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM emergency_contract WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this update'];
             }
            $stmt = $this->pdo->prepare("UPDATE emergency_contract SET first_name='$first_name', last_name='$last_name',
            other_relationship_to_yp='$other_relationship_to_yp', main_contact_number='$main_contact_number',
            secondary_contact_number='$secondary_contact_number', email='$email', address='$address',
            country_territory='$country_territory', state='$state', street='$street',start_date='$start_date', 
            start_time='$start_time', end_date='$end_date', end_time='$end_time', session='$session',
            communication_method='$communication_method', venue_of_session='$venue_of_session', notes='$notes' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Emergency contract updated successfully']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    }  
    
    
   
    public function delete_emergency_contract($id) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM emergency_contract WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this delete'];
            }
            $stmt = $this->pdo->prepare("UPDATE emergency_contract SET status='delete' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Emergency contract successfully deleted']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    }  


    public function post_risk_accessment_plan(
        $risk_accessment_plan_id,
        $name,
        $assessment_date,
        $next_assessment_date,
        $rap_id,
        $type_of_risk,
        $description_of_risk,
        $risk_triggers,
        $mitigating_factors,
        $plan,
        $who_needs_to_know,
        $created_by,
        $last_modified,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $session,
        $communication_method,
        $venue_of_session,
        $notes,
        $creator_id
    ){
        try {
            
            $stmt = $this->pdo->prepare('INSERT INTO risk_accessment_plan (
            risk_accessment_plan_id, name, assessment_date, next_assessment_date,
            rap_id, type_of_risk, description_of_risk, risk_triggers, mitigating_factors,
            plan, who_needs_to_know, created_by, last_modified,start_date, start_time, 
            end_date, end_time, session, communication_method, venue_of_session, notes, creator_id) 
            VALUES ( :risk_accessment_plan_id, :name, :assessment_date, :next_assessment_date,
            :rap_id, :type_of_risk, :description_of_risk, :risk_triggers, :mitigating_factors,
            :plan, :who_needs_to_know, :created_by, :last_modified, :start_date, :start_time, :end_date, :end_time, 
            :session, :communication_method, :venue_of_session, :notes, :creator_id)');
            $stmt->execute(['risk_accessment_plan_id'=>$risk_accessment_plan_id, 'name'=>$name,
            'assessment_date'=>$assessment_date, 'next_assessment_date'=>$next_assessment_date,
            'rap_id'=>$rap_id, 'type_of_risk'=>$type_of_risk, 'description_of_risk'=>$description_of_risk,
            'risk_triggers'=>$risk_triggers, 'mitigating_factors'=>$mitigating_factors, 'plan'=>$plan,
            'who_needs_to_know'=>$who_needs_to_know, 'created_by'=>$created_by, 'last_modified'=>$last_modified, 
            'start_date'=>$start_date, 'start_time'=>$start_time, 'end_date'=>$end_date, 'end_time'=>$end_time, 
            'session'=>$session, 'communication_method'=>$communication_method, 
            'venue_of_session'=>$venue_of_session, 'notes'=>$notes, 'creator_id'=>$creator_id
            ]);

            return ['status' => 'success', 'message' => 'New risk accessment plan registered successfully'];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        }
    } 

    public function get_all_risk_accessment_plan() { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM risk_accessment_plan WHERE status IS NULL');
            $stmt->execute(); 
            $get_all_risk_accessment_plan = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => 'success','data'=>$get_all_risk_accessment_plan]; 
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    }    

    public function get_risk_accessment_plan($id) { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM risk_accessment_plan WHERE status IS NULL AND id = :id');
            $stmt->execute(['id' => $id]); 
            $get_risk_accessment_plan= $stmt->fetch(PDO::FETCH_ASSOC);
            if($get_risk_accessment_plan){  
                return ['status' => 'success','data'=>$get_risk_accessment_plan]; 
               
            }
            return ['status' => 'error', 'message' => 'No risk accessment plan record for this '.$id];
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    } 

        
    public function update_risk_accessment_plan(
        $risk_accessment_plan_id,
        $name,
        $assessment_date,
        $next_assessment_date,
        $rap_id,
        $type_of_risk,
        $description_of_risk,
        $risk_triggers,
        $mitigating_factors,
        $plan,
        $who_needs_to_know,
        $created_by,
        $last_modified,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $session,
        $communication_method,
        $venue_of_session,
        $notes,
        $id
    ) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM risk_accessment_plan WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this update'];
             }
            $stmt = $this->pdo->prepare("UPDATE risk_accessment_plan SET risk_accessment_plan_id='$risk_accessment_plan_id',
            name='$name', assessment_date='$assessment_date', next_assessment_date='$next_assessment_date', rap_id='$rap_id',
            type_of_risk='$type_of_risk', description_of_risk='$description_of_risk', risk_triggers='$risk_triggers', 
            mitigating_factors='$mitigating_factors', plan='$plan', who_needs_to_know='$who_needs_to_know', created_by='$created_by', 
            last_modified='$last_modified', start_date='$start_date', start_time='$start_time', end_date='$end_date', end_time='$end_time', 
            session='$session', communication_method='$communication_method', venue_of_session='$venue_of_session', notes='$notes' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Risk accessment plan updated successfully']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    }         
    
    public function delete_risk_accessment_plan($id) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM risk_accessment_plan WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this delete'];
            }
            $stmt = $this->pdo->prepare("UPDATE risk_accessment_plan SET status='delete' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Risk accessment plan successfully deleted']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    }
    

    public function post_service_check_daily_report(
        $service,
        $compiled_by,
        $staff_lead,
        $date,
        $escape_route,
        $fire_warning_indicator,
        $emergency_lightning_good,
        $extinguishers_fire_fighters,
        $flammable_material_secure,
        $evidence_of_used_battery_charger,
        $kitchen_is_clean_and_tidy,
        $cooker_Extractor_in_good_condition,
        $floor_are_non_slip_and_dry,
        $adequate_handwashing_facilities,
        $food_waste_in_suitable_containers,
        $food_stored_in_suitable_containers,
        $fridge_and_freezers_are_working,
        $floor_stairways_and_corridor_clear,
        $floors_are_free_from_trailing_wires,
        $floor_converings_in_good_condition,
        $secure_handrails_and_stairways,
        $bathroom_clean_and_working,
        $running_water,
        $maintenance_hours_reported,
        $refuse_collected_store_correctly,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $session,
        $communication_method,
        $venue_of_session,
        $notes,
        $creator_id
    ){
        try {
            $stmt = $this->pdo->prepare('INSERT INTO service_check_daily_report (
            service, compiled_by, staff_lead, date, escape_route, fire_warning_indicator, emergency_lightning_good,
            extinguishers_fire_fighters, flammable_material_secure, evidence_of_used_battery_charger, kitchen_is_clean_and_tidy,
            cooker_Extractor_in_good_condition, floor_are_non_slip_and_dry, adequate_handwashing_facilities, 
            food_waste_in_suitable_containers, food_stored_in_suitable_containers, fridge_and_freezers_are_working,
            floor_stairways_and_corridor_clear, floors_are_free_from_trailing_wires, floor_converings_in_good_condition,
            secure_handrails_and_stairways, bathroom_clean_and_working, running_water, maintenance_hours_reported,
            refuse_collected_store_correctly, start_date, start_time, end_date, end_time, session, communication_method, 
            venue_of_session, notes, creator_id) VALUES (:service, :compiled_by, :staff_lead, :date, :escape_route, :fire_warning_indicator,
            :emergency_lightning_good, :extinguishers_fire_fighters, :flammable_material_secure, :evidence_of_used_battery_charger,
            :kitchen_is_clean_and_tidy, :cooker_Extractor_in_good_condition, :floor_are_non_slip_and_dry, :adequate_handwashing_facilities,
            :food_waste_in_suitable_containers, :food_stored_in_suitable_containers, :fridge_and_freezers_are_working, :floor_stairways_and_corridor_clear,
            :floors_are_free_from_trailing_wires, :floor_converings_in_good_condition, :secure_handrails_and_stairways, :bathroom_clean_and_working,
            :running_water, :maintenance_hours_reported, :refuse_collected_store_correctly, :start_date, :start_time, :end_date, :end_time, 
            :session, :communication_method, :venue_of_session, :notes, :creator_id)');
            $stmt->execute(['service'=>$service, 'compiled_by'=>$compiled_by, 'staff_lead'=>$staff_lead, 'date'=>$date, 'escape_route'=>$escape_route,
            'fire_warning_indicator'=>$fire_warning_indicator, 'emergency_lightning_good'=>$emergency_lightning_good, 'extinguishers_fire_fighters'=>$extinguishers_fire_fighters,
            'flammable_material_secure'=>$flammable_material_secure,'evidence_of_used_battery_charger'=>$evidence_of_used_battery_charger, 
            'kitchen_is_clean_and_tidy'=>$kitchen_is_clean_and_tidy, 'cooker_Extractor_in_good_condition'=>$cooker_Extractor_in_good_condition, 
            'floor_are_non_slip_and_dry'=>$floor_are_non_slip_and_dry, 'adequate_handwashing_facilities'=>$adequate_handwashing_facilities,
            'food_waste_in_suitable_containers'=>$food_waste_in_suitable_containers,'food_stored_in_suitable_containers'=>$food_stored_in_suitable_containers, 
            'fridge_and_freezers_are_working'=>$fridge_and_freezers_are_working, 'floor_stairways_and_corridor_clear'=>$floor_stairways_and_corridor_clear, 
            'floors_are_free_from_trailing_wires'=>$floors_are_free_from_trailing_wires,  'floor_converings_in_good_condition'=>$floor_converings_in_good_condition,
            'secure_handrails_and_stairways'=>$secure_handrails_and_stairways, 'bathroom_clean_and_working'=>$bathroom_clean_and_working, 'running_water'=>$running_water,
            'maintenance_hours_reported'=>$maintenance_hours_reported, 'refuse_collected_store_correctly'=>$refuse_collected_store_correctly, 'start_date'=>$start_date,
            'start_time'=>$start_time, 'end_date'=>$end_date, 'end_time'=>$end_time, 'session'=>$session, 'communication_method'=>$communication_method, 
            'venue_of_session'=>$venue_of_session, 'notes'=>$notes, 'creator_id'=>$creator_id
            ]);

            return ['status' => 'success', 'message' => 'New service check daily report registered successfully'];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        }
    } 

    public function get_all_service_check_daily_report() { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM service_check_daily_report WHERE status IS NULL');
            $stmt->execute(); 
            $get_all_service_check_daily_report = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => 'success','data'=>$get_all_service_check_daily_report]; 
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    } 
    

    public function get_service_check_daily_report($id) { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM service_check_daily_report WHERE status IS NULL AND id = :id');
            $stmt->execute(['id' => $id]); 
            $get_service_check_daily_report= $stmt->fetch(PDO::FETCH_ASSOC);
            if($get_service_check_daily_report){  
                return ['status' => 'success','data'=>$get_service_check_daily_report]; 
               
            }
            return ['status' => 'error', 'message' => 'No service check daily report record for this '.$id];
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    } 


    public function update_service_check_daily_report(
        $service,
        $compiled_by,
        $staff_lead,
        $date,
        $escape_route,
        $fire_warning_indicator,
        $emergency_lightning_good,
        $extinguishers_fire_fighters,
        $flammable_material_secure,
        $evidence_of_used_battery_charger,
        $kitchen_is_clean_and_tidy,
        $cooker_Extractor_in_good_condition,
        $floor_are_non_slip_and_dry,
        $adequate_handwashing_facilities,
        $food_waste_in_suitable_containers,
        $food_stored_in_suitable_containers,
        $fridge_and_freezers_are_working,
        $floor_stairways_and_corridor_clear,
        $floors_are_free_from_trailing_wires,
        $floor_converings_in_good_condition,
        $secure_handrails_and_stairways,
        $bathroom_clean_and_working,
        $running_water,
        $maintenance_hours_reported,
        $refuse_collected_store_correctly,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $session,
        $communication_method,
        $venue_of_session,
        $notes,
        $id
    ) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM service_check_daily_report WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this update'];
             }
            $stmt = $this->pdo->prepare("UPDATE service_check_daily_report SET service='$service', compiled_by='$compiled_by', staff_lead='$staff_lead',
            date='$date', escape_route='$escape_route', fire_warning_indicator='$fire_warning_indicator', emergency_lightning_good='$emergency_lightning_good', 
            extinguishers_fire_fighters='$extinguishers_fire_fighters', flammable_material_secure='$flammable_material_secure',
            evidence_of_used_battery_charger='$evidence_of_used_battery_charger', kitchen_is_clean_and_tidy='$kitchen_is_clean_and_tidy', 
            cooker_Extractor_in_good_condition='$cooker_Extractor_in_good_condition', floor_are_non_slip_and_dry='$floor_are_non_slip_and_dry', 
            adequate_handwashing_facilities='$adequate_handwashing_facilities', food_waste_in_suitable_containers='$food_waste_in_suitable_containers',
            food_stored_in_suitable_containers='$food_stored_in_suitable_containers',fridge_and_freezers_are_working='$fridge_and_freezers_are_working', 
            floor_stairways_and_corridor_clear='$floor_stairways_and_corridor_clear', floors_are_free_from_trailing_wires='$floors_are_free_from_trailing_wires',  
            floor_converings_in_good_condition='$floor_converings_in_good_condition', secure_handrails_and_stairways='$secure_handrails_and_stairways', 
            bathroom_clean_and_working='$bathroom_clean_and_working', running_water='$running_water', maintenance_hours_reported='$maintenance_hours_reported', 
            refuse_collected_store_correctly='$refuse_collected_store_correctly', start_date='$start_date', start_time='$start_time', end_date='$end_date',
            end_time='$end_time', session='$session', communication_method='$communication_method', venue_of_session='$venue_of_session', notes='$notes' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Service check daily report updated successfully']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    }      

        
    public function delete_service_check_daily_report($id) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM service_check_daily_report WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this delete'];
            }
            $stmt = $this->pdo->prepare("UPDATE service_check_daily_report SET status='delete' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Service check daily report successfully deleted']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this delete'];
        } 
    } 


    public function post_service_check_weekly_report(
        $smoke_alarm_tested_and_working,
        $fire_alarm_points_system_working,
        $carbon_monoxide_alarm_tested,
        $charging_indicator_on_emergency_lighting,
        $evidence_of_used_battery_charger,
        $washing_machine_filter_cleaned,
        $water_filter_in_staff_office_changed,
        $charcoal_filter_changed_to_ovenhob,
        $unneccesary_combustible_material,
        $ventilations_are_not_obstructed,
        $lightning_levels_are_adequate,
        $lights_are_working_satisfactorily, 
        $line_filter_in_tumble_dryer_cleaned,
        $kitchen_is_clean_tidy,
        $cooker_extractor_in_good_condition,
        $fridge_and_freezers_are_working,
        $staff_have_sufficient_space,
        $desk_work_area_suitable,
        $seat_lower_back_support,
        $unused_water_outlet_flushed,
        $showerheads_in_good_conditions,
        $provision_disposal_of_sanitary_towels,
        $cable_coverings_in_good_conditions,
        $electrical_equipment_in_good_condition,
        $electrical_sockets_in_good_condition,
        $power_socket_not_overloaded,
        $working_environment_satisfactory,
        $chairs_good_condition_adjustable,
        $coshh_cupboards_signed_and_locked,
        $first_aid_arrangement_posters,
        $employers_insurance_liability_shown,
        $health_safety_law_poster_shown,
        $entrance_exit_free_from_obstruction,
        $entrance_area_in_good_condition,
        $drains_and_water_pipes_working,
        $cctv_in_working_conditions,
        $no_item_to_start_fire,
        $refuse_collected_store_correctly,
        $security_lightning_is_working,
        $box_location_1,
        $no_of_guidance_leaflet_1,
        $no_of_adhesive_dressings_1,
        $no_of_adhesive_pads_with_bandage_1,
        $no_of_wrapped_triangular_bandage_1,
        $no_of_medium_dressings_1,
        $no_of_large_dressings_1,
        $no_of_safety_pins_1,
        $box_location_2,
        $no_of_guidance_leaflet_2,
        $no_of_adhesive_dressings_2,
        $no_of_adhesive_pads_with_bandage_2,
        $no_of_wrapped_triangular_bandage_2,
        $no_of_medium_dressings_2,
        $no_of_large_dressings_2,
        $no_of_safety_pins_2,
        $no_of_moisture_cleaning_wipes,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $session,
        $communication_method,
        $venue_of_session,
        $notes,
        $creator_id
    ){
        try {
            $stmt = $this->pdo->prepare('INSERT INTO service_check_weekly_report (
            smoke_alarm_tested_and_working, fire_alarm_points_system_working, carbon_monoxide_alarm_tested,
            charging_indicator_on_emergency_lighting, evidence_of_used_battery_charger,
            washing_machine_filter_cleaned, water_filter_in_staff_office_changed,
            charcoal_filter_changed_to_ovenhob, unneccesary_combustible_material,
            ventilations_are_not_obstructed, lightning_levels_are_adequate, lights_are_working_satisfactorily, 
            line_filter_in_tumble_dryer_cleaned, kitchen_is_clean_tidy, cooker_extractor_in_good_condition,
            fridge_and_freezers_are_working, staff_have_sufficient_space, desk_work_area_suitable,
            seat_lower_back_support, unused_water_outlet_flushed, showerheads_in_good_conditions,
            provision_disposal_of_sanitary_towels, cable_coverings_in_good_conditions,
            electrical_equipment_in_good_condition, electrical_sockets_in_good_condition, 
            power_socket_not_overloaded, working_environment_satisfactory, chairs_good_condition_adjustable,
            coshh_cupboards_signed_and_locked, first_aid_arrangement_posters, employers_insurance_liability_shown,
            health_safety_law_poster_shown, entrance_exit_free_from_obstruction, entrance_area_in_good_condition,
            drains_and_water_pipes_working, cctv_in_working_conditions, no_item_to_start_fire, 
            refuse_collected_store_correctly, security_lightning_is_working, box_location_1,
            no_of_guidance_leaflet_1, no_of_adhesive_dressings_1, no_of_adhesive_pads_with_bandage_1,
            no_of_wrapped_triangular_bandage_1, no_of_medium_dressings_1, no_of_large_dressings_1, no_of_safety_pins_1,
            box_location_2, no_of_guidance_leaflet_2, no_of_adhesive_dressings_2, no_of_adhesive_pads_with_bandage_2,
            no_of_wrapped_triangular_bandage_2, no_of_medium_dressings_2, no_of_large_dressings_2, no_of_safety_pins_2,
            no_of_moisture_cleaning_wipes, start_date, start_time, end_date, end_time, session, communication_method, 
            venue_of_session, notes, creator_id) VALUES ( :smoke_alarm_tested_and_working, :fire_alarm_points_system_working, 
            :carbon_monoxide_alarm_tested, :charging_indicator_on_emergency_lighting, :evidence_of_used_battery_charger,
            :washing_machine_filter_cleaned, :water_filter_in_staff_office_changed, :charcoal_filter_changed_to_ovenhob, 
            :unneccesary_combustible_material, :ventilations_are_not_obstructed, :lightning_levels_are_adequate, 
            :lights_are_working_satisfactorily, :line_filter_in_tumble_dryer_cleaned, :kitchen_is_clean_tidy, 
            :cooker_extractor_in_good_condition, :fridge_and_freezers_are_working, :staff_have_sufficient_space, 
            :desk_work_area_suitable, :seat_lower_back_support, :unused_water_outlet_flushed, :showerheads_in_good_conditions,
            :provision_disposal_of_sanitary_towels, :cable_coverings_in_good_conditions, :electrical_equipment_in_good_condition, 
            :electrical_sockets_in_good_condition, :power_socket_not_overloaded, :working_environment_satisfactory, 
            :chairs_good_condition_adjustable, :coshh_cupboards_signed_and_locked, :first_aid_arrangement_posters, 
            :employers_insurance_liability_shown, :health_safety_law_poster_shown, :entrance_exit_free_from_obstruction, 
            :entrance_area_in_good_condition, :drains_and_water_pipes_working, :cctv_in_working_conditions, :no_item_to_start_fire, 
            :refuse_collected_store_correctly, :security_lightning_is_working, :box_location_1, :no_of_guidance_leaflet_1, 
            :no_of_adhesive_dressings_1, :no_of_adhesive_pads_with_bandage_1, :no_of_wrapped_triangular_bandage_1, :no_of_medium_dressings_1, 
            :no_of_large_dressings_1, :no_of_safety_pins_1, :box_location_2, :no_of_guidance_leaflet_2, :no_of_adhesive_dressings_2, 
            :no_of_adhesive_pads_with_bandage_2, :no_of_wrapped_triangular_bandage_2, :no_of_medium_dressings_2, :no_of_large_dressings_2, 
            :no_of_safety_pins_2, :no_of_moisture_cleaning_wipes, :start_date, :start_time, :end_date, :end_time, :session, :communication_method, 
            :venue_of_session, :notes, :creator_id)');
            $stmt->execute(['smoke_alarm_tested_and_working'=>$smoke_alarm_tested_and_working, 'fire_alarm_points_system_working'=>$fire_alarm_points_system_working,
            'carbon_monoxide_alarm_tested'=>$carbon_monoxide_alarm_tested, 'charging_indicator_on_emergency_lighting'=>$charging_indicator_on_emergency_lighting,
            'evidence_of_used_battery_charger'=>$evidence_of_used_battery_charger, 'washing_machine_filter_cleaned'=>$washing_machine_filter_cleaned,
            'water_filter_in_staff_office_changed'=>$water_filter_in_staff_office_changed, 'charcoal_filter_changed_to_ovenhob'=>$charcoal_filter_changed_to_ovenhob,
            'unneccesary_combustible_material'=>$unneccesary_combustible_material, 'ventilations_are_not_obstructed'=>$ventilations_are_not_obstructed,
            'lightning_levels_are_adequate'=>$lightning_levels_are_adequate, 'lights_are_working_satisfactorily'=>$lights_are_working_satisfactorily, 
            'line_filter_in_tumble_dryer_cleaned'=>$line_filter_in_tumble_dryer_cleaned, 'kitchen_is_clean_tidy'=>$kitchen_is_clean_tidy,
            'cooker_extractor_in_good_condition'=>$cooker_extractor_in_good_condition, 'fridge_and_freezers_are_working'=>$fridge_and_freezers_are_working,
            'staff_have_sufficient_space'=>$staff_have_sufficient_space, 'desk_work_area_suitable'=>$desk_work_area_suitable,
            'seat_lower_back_support'=>$seat_lower_back_support, 'unused_water_outlet_flushed'=>$unused_water_outlet_flushed,
            'showerheads_in_good_conditions'=>$showerheads_in_good_conditions, 'provision_disposal_of_sanitary_towels'=>$provision_disposal_of_sanitary_towels,
            'cable_coverings_in_good_conditions'=>$cable_coverings_in_good_conditions, 'electrical_equipment_in_good_condition'=>$electrical_equipment_in_good_condition,
            'electrical_sockets_in_good_condition'=>$electrical_sockets_in_good_condition, 'power_socket_not_overloaded'=>$power_socket_not_overloaded,
            'working_environment_satisfactory'=>$working_environment_satisfactory, 'chairs_good_condition_adjustable'=>$chairs_good_condition_adjustable,
            'coshh_cupboards_signed_and_locked'=>$coshh_cupboards_signed_and_locked, 'first_aid_arrangement_posters'=>$first_aid_arrangement_posters,
            'employers_insurance_liability_shown'=>$employers_insurance_liability_shown, 'health_safety_law_poster_shown'=>$health_safety_law_poster_shown,
            'entrance_exit_free_from_obstruction'=>$entrance_exit_free_from_obstruction, 'entrance_area_in_good_condition'=>$entrance_area_in_good_condition,
            'drains_and_water_pipes_working'=>$drains_and_water_pipes_working, 'cctv_in_working_conditions'=>$cctv_in_working_conditions,
            'no_item_to_start_fire'=>$no_item_to_start_fire, 'refuse_collected_store_correctly'=>$refuse_collected_store_correctly,
            'security_lightning_is_working'=>$security_lightning_is_working, 'box_location_1'=>$box_location_1, 'no_of_guidance_leaflet_1'=>$no_of_guidance_leaflet_1,
            'no_of_adhesive_dressings_1'=>$no_of_adhesive_dressings_1, 'no_of_adhesive_pads_with_bandage_1'=>$no_of_adhesive_pads_with_bandage_1,
            'no_of_wrapped_triangular_bandage_1'=>$no_of_wrapped_triangular_bandage_1, 'no_of_medium_dressings_1'=>$no_of_medium_dressings_1,
            'no_of_large_dressings_1'=>$no_of_large_dressings_1, 'no_of_safety_pins_1'=>$no_of_safety_pins_1,
            'box_location_2'=>$box_location_2, 'no_of_guidance_leaflet_2'=>$no_of_guidance_leaflet_2,
            'no_of_adhesive_dressings_2'=>$no_of_adhesive_dressings_2, 'no_of_adhesive_pads_with_bandage_2'=>$no_of_adhesive_pads_with_bandage_2,
            'no_of_wrapped_triangular_bandage_2'=>$no_of_wrapped_triangular_bandage_2, 'no_of_medium_dressings_2'=>$no_of_medium_dressings_2,
            'no_of_large_dressings_2'=>$no_of_large_dressings_2, 'no_of_safety_pins_2'=>$no_of_safety_pins_2, 'no_of_moisture_cleaning_wipes'=>$no_of_moisture_cleaning_wipes,
            'start_date'=>$start_date, 'start_time'=>$start_time, 'end_date'=>$end_date, 'end_time'=>$end_time, 'session'=>$session, 'communication_method'=>$communication_method, 
            'venue_of_session'=>$venue_of_session, 'notes'=>$notes, 'creator_id'=>$creator_id
            ]);

            return ['status' => 'success', 'message' => 'New service check weekly report registered successfully'];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        }
    } 
    
    public function get_all_service_check_weekly_report() { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM service_check_weekly_report WHERE status IS NULL');
            $stmt->execute(); 
            $get_all_service_check_weekly_report = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => 'success','data'=>$get_all_service_check_weekly_report]; 
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    }
    
    
    public function get_service_check_weekly_report($id) { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM service_check_weekly_report WHERE status IS NULL AND id = :id');
            $stmt->execute(['id' => $id]); 
            $get_service_check_weekly_report= $stmt->fetch(PDO::FETCH_ASSOC);
            if($get_service_check_weekly_report){  
                return ['status' => 'success','data'=>$get_service_check_weekly_report]; 
               
            }
            return ['status' => 'error', 'message' => 'No service check weekly report record for this '.$id];
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    }    

    public function delete_service_check_weekly_report($id) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM service_check_weekly_report WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this delete'];
            }
            $stmt = $this->pdo->prepare("UPDATE service_check_weekly_report SET status='delete' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Service check weekly report successfully deleted']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    }   
    
    
    public function update_service_check_weekly_report(
        $smoke_alarm_tested_and_working,
        $fire_alarm_points_system_working,
        $carbon_monoxide_alarm_tested,
        $charging_indicator_on_emergency_lighting,
        $evidence_of_used_battery_charger,
        $washing_machine_filter_cleaned,
        $water_filter_in_staff_office_changed,
        $charcoal_filter_changed_to_ovenhob,
        $unneccesary_combustible_material,
        $ventilations_are_not_obstructed,
        $lightning_levels_are_adequate,
        $lights_are_working_satisfactorily, 
        $line_filter_in_tumble_dryer_cleaned,
        $kitchen_is_clean_tidy,
        $cooker_extractor_in_good_condition,
        $fridge_and_freezers_are_working,
        $staff_have_sufficient_space,
        $desk_work_area_suitable,
        $seat_lower_back_support,
        $unused_water_outlet_flushed,
        $showerheads_in_good_conditions,
        $provision_disposal_of_sanitary_towels,
        $cable_coverings_in_good_conditions,
        $electrical_equipment_in_good_condition,
        $electrical_sockets_in_good_condition,
        $power_socket_not_overloaded,
        $working_environment_satisfactory,
        $chairs_good_condition_adjustable,
        $coshh_cupboards_signed_and_locked,
        $first_aid_arrangement_posters,
        $employers_insurance_liability_shown,
        $health_safety_law_poster_shown,
        $entrance_exit_free_from_obstruction,
        $entrance_area_in_good_condition,
        $drains_and_water_pipes_working,
        $cctv_in_working_conditions,
        $no_item_to_start_fire,
        $refuse_collected_store_correctly,
        $security_lightning_is_working,
        $box_location_1,
        $no_of_guidance_leaflet_1,
        $no_of_adhesive_dressings_1,
        $no_of_adhesive_pads_with_bandage_1,
        $no_of_wrapped_triangular_bandage_1,
        $no_of_medium_dressings_1,
        $no_of_large_dressings_1,
        $no_of_safety_pins_1,
        $box_location_2,
        $no_of_guidance_leaflet_2,
        $no_of_adhesive_dressings_2,
        $no_of_adhesive_pads_with_bandage_2,
        $no_of_wrapped_triangular_bandage_2,
        $no_of_medium_dressings_2,
        $no_of_large_dressings_2,
        $no_of_safety_pins_2,
        $no_of_moisture_cleaning_wipes,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $session,
        $communication_method,
        $venue_of_session,
        $notes,
        $id
    ) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM service_check_weekly_report WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this update'];
             }
            $stmt = $this->pdo->prepare("UPDATE service_check_weekly_report SET smoke_alarm_tested_and_working='$smoke_alarm_tested_and_working',
            fire_alarm_points_system_working='$fire_alarm_points_system_working', carbon_monoxide_alarm_tested='$carbon_monoxide_alarm_tested',
            charging_indicator_on_emergency_lighting='$charging_indicator_on_emergency_lighting', evidence_of_used_battery_charger='$evidence_of_used_battery_charger',
            washing_machine_filter_cleaned='$washing_machine_filter_cleaned', water_filter_in_staff_office_changed='$water_filter_in_staff_office_changed',
            charcoal_filter_changed_to_ovenhob='$charcoal_filter_changed_to_ovenhob', unneccesary_combustible_material='$unneccesary_combustible_material',
            ventilations_are_not_obstructed='$ventilations_are_not_obstructed', lightning_levels_are_adequate='$lightning_levels_are_adequate',
            lights_are_working_satisfactorily='$lights_are_working_satisfactorily', line_filter_in_tumble_dryer_cleaned='$line_filter_in_tumble_dryer_cleaned',
            kitchen_is_clean_tidy='$kitchen_is_clean_tidy', cooker_extractor_in_good_condition='$cooker_extractor_in_good_condition',
            fridge_and_freezers_are_working='$fridge_and_freezers_are_working', staff_have_sufficient_space='$staff_have_sufficient_space', 
            desk_work_area_suitable='$desk_work_area_suitable', seat_lower_back_support='$seat_lower_back_support', unused_water_outlet_flushed='$unused_water_outlet_flushed',
            showerheads_in_good_conditions='$showerheads_in_good_conditions', provision_disposal_of_sanitary_towels='$provision_disposal_of_sanitary_towels',
            cable_coverings_in_good_conditions='$cable_coverings_in_good_conditions', electrical_equipment_in_good_condition='$electrical_equipment_in_good_condition', 
            electrical_sockets_in_good_condition='$electrical_sockets_in_good_condition', power_socket_not_overloaded='$power_socket_not_overloaded',
            working_environment_satisfactory='$working_environment_satisfactory', chairs_good_condition_adjustable='$chairs_good_condition_adjustable',
            coshh_cupboards_signed_and_locked='$coshh_cupboards_signed_and_locked', first_aid_arrangement_posters='$first_aid_arrangement_posters',
            employers_insurance_liability_shown='$employers_insurance_liability_shown', health_safety_law_poster_shown='$health_safety_law_poster_shown',
            entrance_exit_free_from_obstruction='$entrance_exit_free_from_obstruction', entrance_area_in_good_condition='$entrance_area_in_good_condition',
            drains_and_water_pipes_working='$drains_and_water_pipes_working', cctv_in_working_conditions='$cctv_in_working_conditions',
            no_item_to_start_fire='$no_item_to_start_fire', refuse_collected_store_correctly='$refuse_collected_store_correctly',
            security_lightning_is_working='$security_lightning_is_working', box_location_1='$box_location_1', no_of_guidance_leaflet_1='$no_of_guidance_leaflet_1', 
            no_of_adhesive_dressings_1='$no_of_adhesive_dressings_1', no_of_adhesive_pads_with_bandage_1='$no_of_adhesive_pads_with_bandage_1',
            no_of_wrapped_triangular_bandage_1='$no_of_wrapped_triangular_bandage_1', no_of_medium_dressings_1='$no_of_medium_dressings_1',
            no_of_large_dressings_1='$no_of_large_dressings_1', no_of_safety_pins_1='$no_of_safety_pins_1', box_location_2='$box_location_2',
            no_of_guidance_leaflet_2='$no_of_guidance_leaflet_2', no_of_adhesive_dressings_2='$no_of_adhesive_dressings_2',
            no_of_adhesive_pads_with_bandage_2='$no_of_adhesive_pads_with_bandage_2', no_of_wrapped_triangular_bandage_2='$no_of_wrapped_triangular_bandage_2',
            no_of_medium_dressings_2='$no_of_medium_dressings_2', no_of_large_dressings_2='$no_of_large_dressings_2', no_of_safety_pins_2='$no_of_safety_pins_2',
            no_of_moisture_cleaning_wipes='$no_of_moisture_cleaning_wipes', start_date='$start_date', start_time='$start_time', end_date='$end_date', end_time='$end_time', 
            session='$session', communication_method='$communication_method', venue_of_session='$venue_of_session', notes='$notes' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Service check daily report updated successfully']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    }      
    


    public function post_service_check_monthly_report(
        $door_seals_and_self_closing_devices,
        $internal_self_closing_firedoors,
        $emergency_lightning_function,
        $evidence_of_used_battery_charger,
        $washing_machine_filter_cleaned,
        $water_dispenser_drip_trays_cleaned,
        $auto_hold_open_freeswing_doors_fitted,
        $sample_water_temperature_test,
        $no_smoking_sign_displayed,
        $furniture_complaints_updated_closed,
        $completed_repairs_updated_closed,
        $add_decoration_to_maintainance,
        $portal_appliances_tested_accurately,
        $kitchen_is_clean_tidy,
        $cooker_extractor_in_good_condition,
        $fridge_and_freezers_are_working,
        $staff_have_sufficient_space,
        $bins_are_emptied_regularly,
        $desk_work_area_suitable,
        $seat_lower_back_support,
        $rooms_are_adequately_ventilated,
        $photocopier_printer_in_good_condition,
        $unused_water_outlet_flushed,
        $showerheads_in_good_conditions,
        $provision_disposal_of_sanitary_towels,
        $cable_coverings_in_good_conditions,
        $electrical_equipment_in_good_condition,
        $electrical_sockets_in_good_condition,
        $power_socket_not_overloaded,
        $working_environment_satisfactory,
        $chairs_in_good_condition_adjustable,
        $coshh_cupboards_signed_locked,
        $first_notice_and_posters,
        $first_exit_and_other_signs_in_place,
        $first_aid_arrangement_posters,
        $employers_insurance_liability_shown,
        $health_safety_law_poster_shown,
        $items_are_safely_stored,
        $entrance_exit_free_from_obstruction,
        $entrance_area_in_good_condition,
        $cctv_in_good_working_condition,
        $box_location_1,
        $no_of_guidance_leaflet_1,
        $no_of_adhesive_dressings_1,
        $no_of_adhesive_pads_with_bandage_1,
        $no_of_wrapped_triangular_bandage_1,
        $no_of_medium_dressings_1,
        $no_of_large_dressings_1,
        $no_of_safety_pins_1,
        $box_location_2,
        $no_of_guidance_leaflet_2,
        $no_of_adhesive_dressings_2,
        $no_of_adhesive_pads_with_bandage_2,
        $no_of_wrapped_triangular_bandage_2,
        $no_of_medium_dressings_2,
        $no_of_large_dressings_2,
        $no_of_safety_pins_2,
        $no_of_moisture_cleaning_wipes,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $session,
        $communication_method,
        $venue_of_session,
        $notes,
        $creator_id
    ){
        try {
            $stmt = $this->pdo->prepare('INSERT INTO service_check_monthly_report (
            door_seals_and_self_closing_devices, internal_self_closing_firedoors, emergency_lightning_function,
            evidence_of_used_battery_charger, washing_machine_filter_cleaned, water_dispenser_drip_trays_cleaned,
            auto_hold_open_freeswing_doors_fitted, sample_water_temperature_test, no_smoking_sign_displayed,
            furniture_complaints_updated_closed, completed_repairs_updated_closed, add_decoration_to_maintainance,
            portal_appliances_tested_accurately, kitchen_is_clean_tidy, cooker_extractor_in_good_condition, 
            fridge_and_freezers_are_working, staff_have_sufficient_space, bins_are_emptied_regularly,
            desk_work_area_suitable, seat_lower_back_support, rooms_are_adequately_ventilated,
            photocopier_printer_in_good_condition, unused_water_outlet_flushed, showerheads_in_good_conditions,
            provision_disposal_of_sanitary_towels, cable_coverings_in_good_conditions,
            electrical_equipment_in_good_condition, electrical_sockets_in_good_condition,
            power_socket_not_overloaded, working_environment_satisfactory, chairs_in_good_condition_adjustable,
            coshh_cupboards_signed_locked, first_notice_and_posters, first_exit_and_other_signs_in_place,
            first_aid_arrangement_posters, employers_insurance_liability_shown, health_safety_law_poster_shown,
            items_are_safely_stored, entrance_exit_free_from_obstruction, entrance_area_in_good_condition,
            cctv_in_good_working_condition, box_location_1, no_of_guidance_leaflet_1, no_of_adhesive_dressings_1, 
            no_of_adhesive_pads_with_bandage_1, no_of_wrapped_triangular_bandage_1, no_of_medium_dressings_1, 
            no_of_large_dressings_1, no_of_safety_pins_1, box_location_2, no_of_guidance_leaflet_2, no_of_adhesive_dressings_2,
            no_of_adhesive_pads_with_bandage_2, no_of_wrapped_triangular_bandage_2, no_of_medium_dressings_2, no_of_large_dressings_2,
            no_of_safety_pins_2, no_of_moisture_cleaning_wipes, start_date, start_time, end_date, end_time, session, communication_method, 
            venue_of_session, notes, creator_id) VALUES ( :door_seals_and_self_closing_devices, :internal_self_closing_firedoors, :emergency_lightning_function,
            :evidence_of_used_battery_charger, :washing_machine_filter_cleaned, :water_dispenser_drip_trays_cleaned,
            :auto_hold_open_freeswing_doors_fitted, :sample_water_temperature_test, :no_smoking_sign_displayed,
            :furniture_complaints_updated_closed, :completed_repairs_updated_closed, :add_decoration_to_maintainance,
            :portal_appliances_tested_accurately, :kitchen_is_clean_tidy, :cooker_extractor_in_good_condition, 
            :fridge_and_freezers_are_working, :staff_have_sufficient_space, :bins_are_emptied_regularly,
            :desk_work_area_suitable, :seat_lower_back_support, :rooms_are_adequately_ventilated,
            :photocopier_printer_in_good_condition, :unused_water_outlet_flushed, :showerheads_in_good_conditions,
            :provision_disposal_of_sanitary_towels, :cable_coverings_in_good_conditions,
            :electrical_equipment_in_good_condition, :electrical_sockets_in_good_condition,
            :power_socket_not_overloaded, :working_environment_satisfactory, :chairs_in_good_condition_adjustable,
            :coshh_cupboards_signed_locked, :first_notice_and_posters, :first_exit_and_other_signs_in_place,
            :first_aid_arrangement_posters, :employers_insurance_liability_shown, :health_safety_law_poster_shown,
            :items_are_safely_stored, :entrance_exit_free_from_obstruction, :entrance_area_in_good_condition,
            :cctv_in_good_working_condition, :box_location_1, :no_of_guidance_leaflet_1, :no_of_adhesive_dressings_1, 
            :no_of_adhesive_pads_with_bandage_1, :no_of_wrapped_triangular_bandage_1, :no_of_medium_dressings_1, 
            :no_of_large_dressings_1, :no_of_safety_pins_1, :box_location_2, :no_of_guidance_leaflet_2, :no_of_adhesive_dressings_2,
            :no_of_adhesive_pads_with_bandage_2, :no_of_wrapped_triangular_bandage_2, :no_of_medium_dressings_2, :no_of_large_dressings_2,
            :no_of_safety_pins_2, :no_of_moisture_cleaning_wipes, :start_date, :start_time, :end_date, :end_time, :session, :communication_method, 
            :venue_of_session, :notes, :creator_id)');
            $stmt->execute(['door_seals_and_self_closing_devices'=>$door_seals_and_self_closing_devices, 
            'internal_self_closing_firedoors'=>$internal_self_closing_firedoors, 'emergency_lightning_function'=>$emergency_lightning_function, 
            'evidence_of_used_battery_charger'=>$evidence_of_used_battery_charger, 'washing_machine_filter_cleaned'=>$washing_machine_filter_cleaned, 
            'water_dispenser_drip_trays_cleaned'=>$water_dispenser_drip_trays_cleaned, 'auto_hold_open_freeswing_doors_fitted'=>$auto_hold_open_freeswing_doors_fitted, 
            'sample_water_temperature_test'=>$sample_water_temperature_test, 'no_smoking_sign_displayed'=>$no_smoking_sign_displayed, 
            'furniture_complaints_updated_closed'=>$furniture_complaints_updated_closed, 'completed_repairs_updated_closed'=>$completed_repairs_updated_closed, 
            'add_decoration_to_maintainance'=>$add_decoration_to_maintainance, 'portal_appliances_tested_accurately'=>$portal_appliances_tested_accurately, 
            'kitchen_is_clean_tidy'=>$kitchen_is_clean_tidy, 'cooker_extractor_in_good_condition'=>$cooker_extractor_in_good_condition, 
            'fridge_and_freezers_are_working'=>$fridge_and_freezers_are_working, 'staff_have_sufficient_space'=>$staff_have_sufficient_space, 
            'bins_are_emptied_regularly'=>$bins_are_emptied_regularly, 'desk_work_area_suitable'=>$desk_work_area_suitable, 'seat_lower_back_support'=>$seat_lower_back_support, 
            'rooms_are_adequately_ventilated'=>$rooms_are_adequately_ventilated, 'photocopier_printer_in_good_condition'=>$photocopier_printer_in_good_condition, 
            'unused_water_outlet_flushed'=>$unused_water_outlet_flushed, 'showerheads_in_good_conditions'=>$showerheads_in_good_conditions,
            'provision_disposal_of_sanitary_towels'=>$provision_disposal_of_sanitary_towels, 'cable_coverings_in_good_conditions'=>$cable_coverings_in_good_conditions, 
            'electrical_equipment_in_good_condition'=>$electrical_equipment_in_good_condition, 'electrical_sockets_in_good_condition'=>$electrical_sockets_in_good_condition, 
            'power_socket_not_overloaded'=>$power_socket_not_overloaded, 'working_environment_satisfactory'=>$working_environment_satisfactory, 
            'chairs_in_good_condition_adjustable'=>$chairs_in_good_condition_adjustable, 'coshh_cupboards_signed_locked'=>$coshh_cupboards_signed_locked, 
            'first_notice_and_posters'=>$first_notice_and_posters, 'first_exit_and_other_signs_in_place'=>$first_exit_and_other_signs_in_place, 
            'first_aid_arrangement_posters'=>$first_aid_arrangement_posters, 'employers_insurance_liability_shown'=>$employers_insurance_liability_shown, 
            'health_safety_law_poster_shown'=>$health_safety_law_poster_shown, 'items_are_safely_stored'=>$items_are_safely_stored, 
            'entrance_exit_free_from_obstruction'=>$entrance_exit_free_from_obstruction, 'entrance_area_in_good_condition'=>$entrance_area_in_good_condition, 
            'cctv_in_good_working_condition'=>$cctv_in_good_working_condition, 'box_location_1'=>$box_location_1, 'no_of_guidance_leaflet_1'=>$no_of_guidance_leaflet_1, 
            'no_of_adhesive_dressings_1'=>$no_of_adhesive_dressings_1, 'no_of_adhesive_pads_with_bandage_1'=>$no_of_adhesive_pads_with_bandage_1, 
            'no_of_wrapped_triangular_bandage_1'=>$no_of_wrapped_triangular_bandage_1, 'no_of_medium_dressings_1'=>$no_of_medium_dressings_1, 
            'no_of_large_dressings_1'=>$no_of_large_dressings_1, 'no_of_safety_pins_1'=>$no_of_safety_pins_1, 'box_location_2'=>$box_location_2, 
            'no_of_guidance_leaflet_2'=>$no_of_guidance_leaflet_2, 'no_of_adhesive_dressings_2'=>$no_of_adhesive_dressings_2, 
            'no_of_adhesive_pads_with_bandage_2'=>$no_of_adhesive_pads_with_bandage_2, 'no_of_wrapped_triangular_bandage_2'=>$no_of_wrapped_triangular_bandage_2, 
            'no_of_medium_dressings_2'=>$no_of_medium_dressings_2, 'no_of_large_dressings_2'=>$no_of_large_dressings_2, 'no_of_safety_pins_2'=>$no_of_safety_pins_2, 
            'no_of_moisture_cleaning_wipes'=>$no_of_moisture_cleaning_wipes, 'start_date'=>$start_date, 'start_time'=>$start_time, 'end_date'=>$end_date, 'end_time'=>$end_time, 'session'=>$session, 
            'communication_method'=>$communication_method, 'venue_of_session'=>$venue_of_session, 'notes'=>$notes, 'creator_id'=>$creator_id
            ]);

            return ['status' => 'success', 'message' => 'New service check monthly report registered successfully'];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        }
    }
    
 
    public function get_all_service_check_monthly_report() { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM service_check_monthly_report WHERE status IS NULL');
            $stmt->execute(); 
            $get_all_service_check_monthly_report = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => 'success','data'=>$get_all_service_check_monthly_report]; 
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    }
    
    
    public function get_service_check_monthly_report($id) { 
        try { 

            $stmt = $this->pdo->prepare('SELECT * FROM service_check_monthly_report WHERE status IS NULL AND id = :id');
            $stmt->execute(['id' => $id]); 
            $get_service_check_monthly_report= $stmt->fetch(PDO::FETCH_ASSOC);
            if($get_service_check_monthly_report){  
                return ['status' => 'success','data'=>$get_service_check_monthly_report]; 
               
            }
            return ['status' => 'error', 'message' => 'No service check monthly report record for this '.$id];
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    }    

    public function delete_service_check_monthly_report($id) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM service_check_monthly_report WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this delete'];
            }
            $stmt = $this->pdo->prepare("UPDATE service_check_monthly_report SET status='delete' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Service check monthly report successfully deleted']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    }
    
    
    public function update_service_check_monthly_report(
        $door_seals_and_self_closing_devices,
        $internal_self_closing_firedoors,
        $emergency_lightning_function,
        $evidence_of_used_battery_charger,
        $washing_machine_filter_cleaned,
        $water_dispenser_drip_trays_cleaned,
        $auto_hold_open_freeswing_doors_fitted,
        $sample_water_temperature_test,
        $no_smoking_sign_displayed,
        $furniture_complaints_updated_closed,
        $completed_repairs_updated_closed,
        $add_decoration_to_maintainance,
        $portal_appliances_tested_accurately,
        $kitchen_is_clean_tidy,
        $cooker_extractor_in_good_condition,
        $fridge_and_freezers_are_working,
        $staff_have_sufficient_space,
        $bins_are_emptied_regularly,
        $desk_work_area_suitable,
        $seat_lower_back_support,
        $rooms_are_adequately_ventilated,
        $photocopier_printer_in_good_condition,
        $unused_water_outlet_flushed,
        $showerheads_in_good_conditions,
        $provision_disposal_of_sanitary_towels,
        $cable_coverings_in_good_conditions,
        $electrical_equipment_in_good_condition,
        $electrical_sockets_in_good_condition,
        $power_socket_not_overloaded,
        $working_environment_satisfactory,
        $chairs_in_good_condition_adjustable,
        $coshh_cupboards_signed_locked,
        $first_notice_and_posters,
        $first_exit_and_other_signs_in_place,
        $first_aid_arrangement_posters,
        $employers_insurance_liability_shown,
        $health_safety_law_poster_shown,
        $items_are_safely_stored,
        $entrance_exit_free_from_obstruction,
        $entrance_area_in_good_condition,
        $cctv_in_good_working_condition,
        $box_location_1,
        $no_of_guidance_leaflet_1,
        $no_of_adhesive_dressings_1,
        $no_of_adhesive_pads_with_bandage_1,
        $no_of_wrapped_triangular_bandage_1,
        $no_of_medium_dressings_1,
        $no_of_large_dressings_1,
        $no_of_safety_pins_1,
        $box_location_2,
        $no_of_guidance_leaflet_2,
        $no_of_adhesive_dressings_2,
        $no_of_adhesive_pads_with_bandage_2,
        $no_of_wrapped_triangular_bandage_2,
        $no_of_medium_dressings_2,
        $no_of_large_dressings_2,
        $no_of_safety_pins_2,
        $no_of_moisture_cleaning_wipes,
        $start_date,
        $start_time,
        $end_date,
        $end_time,
        $session,
        $communication_method,
        $venue_of_session,
        $notes,
        $id
    ) { 
        try { 
            $stmt = $this->pdo->prepare('SELECT * FROM service_check_monthly_report WHERE id = :id');
            $stmt->execute(['id' => $id]);

            if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['status' => 'error', 'message' => 'You don\'t have permission to carry out this update'];
             }
            $stmt = $this->pdo->prepare("UPDATE service_check_monthly_report SET door_seals_and_self_closing_devices='$door_seals_and_self_closing_devices',
            internal_self_closing_firedoors='$internal_self_closing_firedoors', emergency_lightning_function='$emergency_lightning_function',
            evidence_of_used_battery_charger='$evidence_of_used_battery_charger', washing_machine_filter_cleaned='$washing_machine_filter_cleaned',
            water_dispenser_drip_trays_cleaned='$water_dispenser_drip_trays_cleaned', auto_hold_open_freeswing_doors_fitted='$auto_hold_open_freeswing_doors_fitted',
            sample_water_temperature_test='$sample_water_temperature_test', no_smoking_sign_displayed='$no_smoking_sign_displayed',
            furniture_complaints_updated_closed='$furniture_complaints_updated_closed', completed_repairs_updated_closed='$completed_repairs_updated_closed',
            add_decoration_to_maintainance='$add_decoration_to_maintainance', portal_appliances_tested_accurately='$portal_appliances_tested_accurately',
            kitchen_is_clean_tidy='$kitchen_is_clean_tidy', cooker_extractor_in_good_condition='$cooker_extractor_in_good_condition', 
            fridge_and_freezers_are_working='$fridge_and_freezers_are_working', staff_have_sufficient_space='$staff_have_sufficient_space',
            desk_work_area_suitable='$desk_work_area_suitable', seat_lower_back_support='$seat_lower_back_support', 
            rooms_are_adequately_ventilated='$rooms_are_adequately_ventilated', photocopier_printer_in_good_condition='$photocopier_printer_in_good_condition',
            unused_water_outlet_flushed='$unused_water_outlet_flushed', showerheads_in_good_conditions='$showerheads_in_good_conditions',
            provision_disposal_of_sanitary_towels='$provision_disposal_of_sanitary_towels', cable_coverings_in_good_conditions='$cable_coverings_in_good_conditions',
            electrical_equipment_in_good_condition='$electrical_equipment_in_good_condition', electrical_sockets_in_good_condition='$electrical_sockets_in_good_condition',
            power_socket_not_overloaded='$power_socket_not_overloaded', working_environment_satisfactory='$working_environment_satisfactory', 
            chairs_in_good_condition_adjustable='$chairs_in_good_condition_adjustable', coshh_cupboards_signed_locked='$coshh_cupboards_signed_locked',
            first_notice_and_posters='$first_notice_and_posters', first_exit_and_other_signs_in_place='$first_exit_and_other_signs_in_place',
            first_aid_arrangement_posters='$first_aid_arrangement_posters', employers_insurance_liability_shown='$employers_insurance_liability_shown',
            health_safety_law_poster_shown='$health_safety_law_poster_shown', items_are_safely_stored='$items_are_safely_stored',
            entrance_exit_free_from_obstruction='$entrance_exit_free_from_obstruction', entrance_area_in_good_condition='$entrance_area_in_good_condition', 
            cctv_in_good_working_condition='$cctv_in_good_working_condition', box_location_1='$box_location_1', no_of_guidance_leaflet_1='$no_of_guidance_leaflet_1', 
            no_of_adhesive_dressings_1='$no_of_adhesive_dressings_1', no_of_adhesive_pads_with_bandage_1='$no_of_adhesive_pads_with_bandage_1',
            no_of_wrapped_triangular_bandage_1='$no_of_wrapped_triangular_bandage_1', no_of_medium_dressings_1='$no_of_medium_dressings_1',
            no_of_large_dressings_1='$no_of_large_dressings_1', no_of_safety_pins_1='$no_of_safety_pins_1', box_location_2='$box_location_2',
            no_of_guidance_leaflet_2='$no_of_guidance_leaflet_2', no_of_adhesive_dressings_2='$no_of_adhesive_dressings_2',
            no_of_adhesive_pads_with_bandage_2='$no_of_adhesive_pads_with_bandage_2', no_of_wrapped_triangular_bandage_2='$no_of_wrapped_triangular_bandage_2',
            no_of_medium_dressings_2='$no_of_medium_dressings_2', no_of_large_dressings_2='$no_of_large_dressings_2', no_of_safety_pins_2='$no_of_safety_pins_2',
            no_of_moisture_cleaning_wipes='$no_of_moisture_cleaning_wipes', start_date='$start_date', start_time='$start_time', end_date='$end_date', end_time='$end_time', 
            session='$session', communication_method='$communication_method', venue_of_session='$venue_of_session', notes='$notes' WHERE id='$id'");
            $stmt->execute();
            return ['status' => 'success','message'=>'Service check monthly report updated successfully']; 
      
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()];
        } 
    }     
       

    public function protectData($data){
        return  strip_tags(trim($data));
    }
    
    public function logout($token) { 
        try { 

            $stmt = $this->pdo->prepare('DELETE FROM tokens WHERE token = :token');
            $stmt->execute(['token' => $token]); 
        
            return ['status' => 'success','message'=>'Logged out successfully ']; 
            
        } catch (PDOException $e) { 
            return ['status' => 'error', 'message' => 'Database query failed: ' . $e->getMessage()]; 
        } 
    }    
              
} ?>