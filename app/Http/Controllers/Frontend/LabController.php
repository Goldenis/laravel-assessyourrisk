<?php


namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Metric;
use App\Models\Metric_answer;
use App\Models\Question;
use App\Models\QuestionOpcion;
use App\Models\Answer;

class LabController extends Controller
{

    public function importFiles()
    {
        ini_set('max_execution_time', 43200);
        ini_set('memory_limit', '1024M');
        /* Init data */
        $carpeta   = "C:\Users\CATARXIS\Desktop\json_ayr";
        $log       = "C:\Users\CATARXIS\Desktop\log_".date('Y_m_d_h_i_s').".txt";
        $metrics   = 0;
        $answers   = 0;
        $index     = 0;
        $questions = Question::all();

        /* Reading Files */
        if(is_dir($carpeta)){
            if($dir = opendir($carpeta)){
                while(($archivo = readdir($dir)) !== false){
                    if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess' && substr($archivo, 0, 1) != '_'){
                        $data = file_get_contents($carpeta.'/'.$archivo);
                        $objects = json_decode($data, true);
                        foreach ($objects as $object) {
                            foreach ($object as $item) {
                                /* Start Metric */
                                $metric = new Metric();
                                $metric->browser    = isset($item['browser'])? $item['browser'] : '';
                                $metric->city       = isset($item['city'])? $item['city'] : '';
                                $metric->state      = isset($item['region'])? $item['region'] : '';
                                $metric->country    = isset($item['country'])? $item['country'] : '';
                                $metric->device     = isset($item['device'])? $item['device'] : '';
                                $metric->ip         = isset($item['ip'])? $item['ip'] : '';
                                $metric->language   = isset($item['language'])? $item['language'] : '';
                                $metric->os         = isset($item['os'])? $item['os'] : '';
                                $metric->pid        = isset($item['pid'])? $item['pid'] : '';
                                $metric->referrer   = isset($item['referrer']['url'])? $item['referrer']['url'] : '';
                                $metric->resolution = isset($item['resolution'])? $item['resolution'] : '';
                                $metric->screen     = isset($item['screen'])? $item['screen'] : '';
                                $metric->save();
                                $metrics++;

                                foreach ($item['actions'] as $actions) {
                                    /* Start Metric Answer */
                                    if (substr($actions['description'], 0, 17) == 'Answered Question' && isset($actions['properties'])) {
                                        $domain        = isset($actions['domain'])? $actions['domain'] : '';
                                        $question_text = isset($actions['properties']['question_text'])? $actions['properties']['question_text'] : '';

                                        foreach ($questions as $question) {
                                            #purge tags
                                            $question_filter = strip_tags($question->name);
                                            #filter string
                                            $question_filter = trim(preg_replace('/\s+/', ' ', $question_filter));

                                            if ($question_text == $question_filter) {
                                                $option_text = isset($actions['properties']['question_answer'])? $actions['properties']['question_answer'] : '';

                                                if ($question->question_type_id != 2) {
                                                    $this->loadMetricAnswer($metric, $domain, $question_text, $question, $option_text);
                                                    $answers++;

                                                }else{
                                                    $selects = @ explode(',', $option_text);
                                                    if(isset($selects) && count($selects)){
                                                        foreach ($selects as $select) {
                                                            $this->loadMetricAnswer($metric, $domain, $question_text, $question, $select);
                                                            $answers++;
                                                        }
                                                    }else{
                                                        $this->loadMetricAnswer($metric, $domain, $question_text, $question, $option_text);
                                                        $answers++;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }

                        $index++;

                        $fp = fopen($log, "a+");
                        fputs($fp, $index." - ".$archivo. " [Load] \r\n");
                        fclose($fp);
                        #change the filename that was read
                        rename ($carpeta.'/'.$archivo, $carpeta.'/'.'_'.$archivo);
                    }
                }
                closedir($dir);
            }
        }
        echo 'Metrics: '.$metrics.' | Metric Answers: '.$answers;
    }

    private function loadMetricAnswer($metric, $domain, $question_text, $question, $option_text)
    {
        $metric_answer = new Metric_Answer();
        $metric_answer->metric_id      = $metric->id;
        $metric_answer->domain         = $domain;
        $metric_answer->question_text  = $question_text;
        $metric_answer->question_id    = $question->id;
        $metric_answer->question_order = $question->order;
        $metric_answer->option_id      = 0;
        $metric_answer->option_text    = $option_text;

        #search options
        $options = QuestionOpcion::where('question_id', $metric_answer->question_id)->get();
        foreach ($options as $option) {
            if ($metric_answer->option_text == $option->name) {
                $metric_answer->option_id = $option->id;
            }
        }

        return $metric_answer->save();

    }

}
