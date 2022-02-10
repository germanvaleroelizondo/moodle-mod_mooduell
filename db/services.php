<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Quiz external functions and service definitions.
 *
 * @package mod_mooduell
 * @category external
 * @copyright 2020 Wunderbyte GmbH (info@wunderbyte.at)
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Moodle 3.1
 */

defined('MOODLE_INTERNAL') || die();

$services = array(
        'Wunderbyte MooDuell external' => array( // Very important, don't rename or will break local_bookingapi plugin!!!
                'functions' => array (
                        'mod_mooduell_get_support',
                        'mod_mooduell_get_purchases',
                        'mod_mooduell_update_iap',
                        'core_webservice_get_site_info',
                        'mod_mooduell_start_attempt',
                        'mod_mooduell_get_game_data',
                        'mod_mooduell_get_quiz_users',
                        'mod_mooduell_get_quizzes_by_courses',
                        'mod_mooduell_get_games_by_courses',
                        'mod_mooduell_answer_question',
                        'mod_mooduell_get_user_stats',
                        'mod_mooduell_get_highscores',
                        'mod_mooduell_set_alternatename',
                        'mod_mooduell_set_pushtokens',
                        'mod_mooduell_giveup_game',
                        'mod_mooduell_update_profile_picture'
                ),
                'restrictedusers' => 0,
                'shortname' => 'mod_mooduell_external',
                'downloadfiles' => 1,    // Allow file downloads.
                'uploadfiles'  => 1,      // Allow file uploads.
                'enabled' => 1
        )
);

$functions = array(
        'mod_mooduell_update_iap' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'update_iapurchases',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Updates the IAP for the user',
                'type' => 'write',
                'capabilities' => 'mod/mooduell:viewinstance',
                'ajax' => true,
        ),
        'mod_mooduell_start_attempt' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'start_attempt',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Starts a new MooDuell game.',
                'type' => 'write',
                'ajax' => true,
                'capabilities' => 'mod/mooduell:play',
                'services' => array(
                        'mod_mooduell_external'
                )
        ),
        'mod_mooduell_get_game_data' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'get_game_data',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Loads all the relevant data of the active MooDuell game for the active user.',
                'type' => 'read',
                'ajax' => true,
                'capabilities' => 'mod/mooduell:play',
                'services' => array(
                        'mod_mooduell_external'
                )
        ),
        'mod_mooduell_get_quiz_users' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'get_quiz_users',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Retrieve all the available co players for the active user in a MooDuell game.',
                'type' => 'read',
                'ajax' => true,
                'capabilities' => 'mod/mooduell:play',
                'services' => array(
                        'mod_mooduell_external'
                )
        ),
        'mod_mooduell_get_quizzes_by_courses' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'get_quizzes_by_courses',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Retrieves all the available quizzes without the games for a course or for all the courses.',
                'type' => 'read',
                'ajax' => true,
                'capabilities' => 'mod/mooduell:play',
                'services' => array(
                        'mod_mooduell_external'
                )
        ),
        'mod_mooduell_get_games_by_courses' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'get_games_by_courses',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Retrieves all the games avalable for the active user
                ordered by quizzes within a course or for the whole site.',
                'type' => 'read',
                'ajax' => true,
                'capabilities' => 'mod/mooduell:play',
                'services' => array(
                        'mod_mooduell_external'
                )
        ),
        'mod_mooduell_answer_question' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'answer_question',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Answers the active question.',
                'type' => 'write',
                'ajax' => true,
                'capabilities' => 'mod/mooduell:play',
                'services' => array(
                        'mod_mooduell_external'
                )
        ),
        'mod_mooduell_get_user_stats' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'get_user_stats',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Retrieves the stats of the active user.',
                'type' => 'read',
                'ajax' => true,
                'capabilities' => 'mod/mooduell:play',
                'services' => array(
                        'mod_mooduell_external'
                )
        ),
        'mod_mooduell_get_highscores' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'get_highscores',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Retrieves the highscores visible to the active user.',
                'type' => 'read',
                'ajax' => true,
                'capabilities' => 'mod/mooduell:play',
                'services' => array(
                        'mod_mooduell_external'
                )
        ),
        'mod_mooduell_set_alternatename' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'set_alternatename',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'This updates the custom field "MooDuell Alias" for the active user.',
                'type' => 'write',
                'ajax' => true,
                'capabilities' => 'mod/mooduell:play',
                'services' => array(
                        'mod_mooduell_external'
                )
        ),
        'mod_mooduell_set_pushtokens' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'set_pushtokens',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'This sets a pushtoken for the active user and for the active device.',
                'type' => 'write',
                'ajax' => true,
                'capabilities' => 'mod/mooduell:play',
                'services' => array(
                        'mod_mooduell_external'
                )
        ),
        'mod_mooduell_giveup_game' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'giveup_game',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Used to allow a user to give up a game.',
                'type' => 'write',
                'ajax' => true,
                'capabilities' => 'mod/mooduell:play',
                'services' => array(
                        'mod_mooduell_external'
                )
        ),
        'mod_mooduell_update_profile_picture' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'update_profile_picture',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'This documentation will be displayed in the generated API documentation
                              (Administration > Plugins > Webservices > API documentation)',
                'type' => 'write',
                'ajax' => true,
                'capabilities' => 'mod/mooduell:play',
                'services' => array(
                        'mod_mooduell_external'
                )
        ),
        'mod_mooduell_load_highscore_data' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'load_highscore_data',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Ajax load list of highscores',
                'type' => 'read',
                'capabilities' => 'mod/mooduell:viewinstance',
                'ajax' => true,
        ),
        'mod_mooduell_load_questions_data' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'load_questions_data',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Ajax load list of questions',
                'type' => 'read',
                'capabilities' => 'mod/mooduell:viewinstance',
                'ajax' => true,
        ),
        'mod_mooduell_load_opengames_data' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'load_opengames_data',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Ajax load list of opengames',
                'type' => 'read',
                'capabilities' => 'mod/mooduell:viewinstance',
                'ajax' => true,
        ),
        'mod_mooduell_load_finishedgames_data' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'load_finishedgames_data',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Ajax load list of finishedgames',
                'type' => 'read',
                'capabilities' => 'mod/mooduell:viewinstance',
                'ajax' => true,
        ),
        'mod_mooduell_get_purchases' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'get_mooduell_purchases',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Returns a list of relevant purchases.',
                'type' => 'read',
                'capabilities' => 'mod/mooduell:viewinstance',
                'ajax' => true,
        ),
        'mod_mooduell_get_support' => array(
                'classname' => 'mod_mooduell_external',
                'methodname' => 'get_mooduell_support',
                'classpath' => 'mod/mooduell/classes/external.php',
                'description' => 'Returns support information.',
                'type' => 'read',
                'capabilities' => 'mod/mooduell:viewinstance',
                'ajax' => true,
        ),
);
