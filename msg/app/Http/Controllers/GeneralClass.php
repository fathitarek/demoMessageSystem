<?php

namespace App\Http\Controllers;

class GeneralClass {
    /**
     *
     * @param type $modelName
     * @param type $numberOfPagination
     * @return  type $url (view with data)
     */
    static function listData($modelName, $numberOfPagination, $url) {
            $records = $modelName::oldest()->paginate($numberOfPagination);
            return view($url, compact('records'));
    }

}


?>
