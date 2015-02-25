<?php

namespace LearnerApi\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use LearnerApi\Diapo;
use Illuminate\Support\Str;
use LearnerApi\Http\Requests\Form1Request;
use LearnerApi\Http\Requests\Form2Request;
use LearnerApi\Http\Requests\Form3Request;
use LearnerApi\Http\Requests\FormQuestion1Request;
use LearnerApi\Http\Requests\FormQuestion2Request;
use LearnerApi\Module;

class DiapoInsertAdminController extends AdminController
{

	public function getInsertToForm($form, $id, $module_id) {
		return view($form)->with('id', $id)
                            ->with('module_id', $module_id);
	}

    public function postInsertFromForm1(Form1Request $request)
    {
        $update = $request->all();
        //insert in first place
        $new_json = [[
            "type" => '1',
            "title" => $update['diapo-title'],
            "data" => $update['diapo-data'],
        ]];
        $diapos= Diapo::where("module_id", "=", $update['module_id'])->where("prev_id", "=", null)->get();
        $new_json = json_encode($new_json);
        $elem = new Diapo();
        $elem->content = $new_json;
        $elem->module()->associate(Module::find($update['module_id']));
        $elem->save();
        if ($update['diapo-id'] == "0")
        {
            foreach ($diapos as $diapo)
            {
                $elem->prev_id = null;
                $elem->next_id = $diapo->id;
                $diapo->prev_id = $elem->id;
                $diapo->save();
            }
        }
        else
        {
            $insert_after = Diapo::find($update['diapo-id']);
            if (!empty($insert_after))
            {
                $insert_before = Diapo::find($insert_after->next_id);
                $insert_after->next_id = $elem->id;
                $elem->prev_id = $insert_after->id;
                $elem->next_id = null;
                if (!empty($insert_before))
                {
                    $elem->next_id = $insert_before->id;
                    $insert_before->prev_id = $elem->id;
                    $insert_before->save();
                }
                $insert_after->save();
            }
        }
        $elem->save();
        return Redirect::action('DiapoAdminController@getHome', ['id'=>$update['module_id']]);
    }
    public function postInsertFromForm2(Form2Request $request)
    {
        $update = $request->all();
        //insert in first place
        $new_json = [[
            "type" => '2',
            "title" => $update['diapo-title'],
        ]];
        $new_file = $update['diapo-picture'];
        $filename = Str::random($length = 30) . '.' . $new_file->getClientOriginalExtension();
        $new_file->move('resources/diapos', $filename);
        $new_json[0]['img'] = asset('resources/diapos/' . $filename);
        $diapos= Diapo::where("module_id", "=", $update['module_id'])->where("prev_id", "=", null)->get();
        $new_json = json_encode($new_json);
        $elem = new Diapo();
        $elem->content = $new_json;
        $elem->module()->associate(Module::find($update['module_id']));
        $elem->save();
        if ($update['diapo-id'] == "0")
        {
            foreach ($diapos as $diapo)
            {
                $elem->prev_id = null;
                $elem->next_id = $diapo->id;
                $diapo->prev_id = $elem->id;
                $diapo->save();
            }
        }
        else
        {
            $insert_after = Diapo::find($update['diapo-id']);
            if (!empty($insert_after))
            {
                $insert_before = Diapo::find($insert_after->next_id);
                $insert_after->next_id = $elem->id;
                $elem->prev_id = $insert_after->id;
                $elem->next_id = null;
                if (!empty($insert_before))
                {
                    $elem->next_id = $insert_before->id;
                    $insert_before->prev_id = $elem->id;
                    $insert_before->save();
                }
                $insert_after->save();
            }
        }
        $elem->save();
        return Redirect::action('DiapoAdminController@getHome', ['id'=>$update['module_id']]);
    }
    public function postInsertFromForm3(Form3Request $request)
    {
        $update = $request->all();
        //insert in first place
        $new_json = [[
            "type" => '3',
            "title" => $update['diapo-title'],
            "data" => $update['diapo-data'],
        ]];
        $new_file = $update['diapo-picture'];
        $filename = Str::random($length = 30) . '.' . $new_file->getClientOriginalExtension();
        $new_file->move('resources/diapos', $filename);
        $new_json[0]['img'] = asset('resources/diapos/' . $filename);
        $diapos= Diapo::where("module_id", "=", $update['module_id'])->where("prev_id", "=", null)->get();
        $new_json = json_encode($new_json);
        $elem = new Diapo();
        $elem->content = $new_json;
        $elem->module()->associate(Module::find($update['module_id']));
        $elem->save();
        if ($update['diapo-id'] == "0")
        {
            foreach ($diapos as $diapo)
            {
                $elem->prev_id = null;
                $elem->next_id = $diapo->id;
                $diapo->prev_id = $elem->id;
                $diapo->save();
            }
        }
        else
        {
            $insert_after = Diapo::find($update['diapo-id']);
            if (!empty($insert_after))
            {
                $insert_before = Diapo::find($insert_after->next_id);
                $insert_after->next_id = $elem->id;
                $elem->prev_id = $insert_after->id;
                $elem->next_id = null;
                if (!empty($insert_before))
                {
                    $elem->next_id = $insert_before->id;
                    $insert_before->prev_id = $elem->id;
                    $insert_before->save();
                }
                $insert_after->save();
            }
        }
        $elem->save();
        return Redirect::action('DiapoAdminController@getHome', ['id'=>$update['module_id']]);
    }
    public function postInsertFromFormQuestion1(FormQuestion1Request $request)
    {
        $update = $request->all();
        //insert in first place
        $new_json = [[
            "type" => '7',
            "question" => $update['diapo-question'],
            "responses" =>
                [
                    [
                        "response" => $update['diapo-response1'],
                        "valid" => "false"
                    ],
                    [
                        "response" => $update['diapo-response2'],
                        "valid" => "false"
                    ],
                    [
                        "response" => $update['diapo-response3'],
                        "valid" => "false"
                    ],
                    [
                        "response" => $update['diapo-response4'],
                        "valid" => "false"
                    ]
                ]
        ]];
        if ($update['select-response1'] == "true")
            $new_json[0]['responses'][0]['valid'] = "true";
        if ($update['select-response2'] == "true")
            $new_json[0]['responses'][1]['valid'] = "true";
        if ($update['select-response3'] == "true")
            $new_json[0]['responses'][2]['valid'] = "true";
        if ($update['select-response4'] == "true")
            $new_json[0]['responses'][3]['valid'] = "true";
        $diapos= Diapo::where("module_id", "=", $update['module_id'])->where("prev_id", "=", null)->get();
        $new_json = json_encode($new_json);
        $elem = new Diapo();
        $elem->content = $new_json;
        $elem->module()->associate(Module::find($update['module_id']));
        $elem->save();
        if ($update['diapo-id'] == "0")
        {
            foreach ($diapos as $diapo)
            {
                $elem->prev_id = null;
                $elem->next_id = $diapo->id;
                $diapo->prev_id = $elem->id;
                $diapo->save();
            }
        }
        else
        {
            $insert_after = Diapo::find($update['diapo-id']);
            if (!empty($insert_after))
            {
                $insert_before = Diapo::find($insert_after->next_id);
                $insert_after->next_id = $elem->id;
                $elem->prev_id = $insert_after->id;
                $elem->next_id = null;
                if (!empty($insert_before))
                {
                    $elem->next_id = $insert_before->id;
                    $insert_before->prev_id = $elem->id;
                    $insert_before->save();
                }
                $insert_after->save();
            }
        }
        $elem->save();
        return Redirect::action('DiapoAdminController@getHome', ['id'=>$update['module_id']]);
    }

    public function postInsertFromFormQuestion2(FormQuestion2Request $request)
    {
        $update = $request->all();
        //insert in first place
        $new_json = [[
            "type" => '8',
            "question" => $update['diapo-question'],
            "response" => $update['diapo-response'],
            "range_begin" => $update['diapo-range_begin'],
            "range_end" => $update['diapo-range_end'],
            "range_step" => $update['diapo-range_step'],
        ]];
        $diapos= Diapo::where("module_id", "=", $update['module_id'])->where("prev_id", "=", null)->get();
        $new_json = json_encode($new_json);
        $elem = new Diapo();
        $elem->content = $new_json;
        $elem->module()->associate(Module::find($update['module_id']));
        $elem->save();
        if ($update['diapo-id'] == "0")
        {
            foreach ($diapos as $diapo)
            {
                $elem->prev_id = null;
                $elem->next_id = $diapo->id;
                $diapo->prev_id = $elem->id;
                $diapo->save();
            }
        }
        else
        {
            $insert_after = Diapo::find($update['diapo-id']);
            if (!empty($insert_after))
            {
                $insert_before = Diapo::find($insert_after->next_id);
                $insert_after->next_id = $elem->id;
                $elem->prev_id = $insert_after->id;
                $elem->next_id = null;
                if (!empty($insert_before))
                {
                    $elem->next_id = $insert_before->id;
                    $insert_before->prev_id = $elem->id;
                    $insert_before->save();
                }
                $insert_after->save();
            }
        }
        $elem->save();
        return Redirect::action('DiapoAdminController@getHome', ['id'=>$update['module_id']]);
    }
}
