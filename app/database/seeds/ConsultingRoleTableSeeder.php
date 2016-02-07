<?php

class ConsultingRoleTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_consulting_roles')->delete();

        Model\ConsultingRole::create(array('consulting_role' => 'Microsoft', 'status' => 1));
        Model\ConsultingRole::create(array('consulting_role' => 'Oracle', 'status' => 1));
        Model\ConsultingRole::create(array('consulting_role' => 'SAP', 'status' => 1));
    }

}
