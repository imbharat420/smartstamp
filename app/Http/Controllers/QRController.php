<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQrRequest;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Models\Qr;
use App\Http\Resources\QrResource;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\HttpCache\Store;

class QrController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return QrResource::collection(
              Qr::where('user_id', Auth()->user()->id)->get()
       );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQrRequest $request)
    {

        $request->validated($request->all());

        $qr = Qr::create([
            'name' => $request->name,
            'description' => $request->description,
            'url' => $request->url,
            'user_id' => Auth()->user()->id,
            'location' => $request->location,
            'qr_code' => $request->qr_code,
            'image' =>$request->file('image')->store('upload/image/'),
        ]);

        return new QrResource($qr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Qr $qr)
    {

       return $this->isNotAuthorized($qr) ? $this->isNotAuthorized($qr) : new QrResource($qr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Qr $qr)
    {
       

        $qr->update($request->all());

         return new QrResource($qr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qr $qr)
    {
       
        return  $this->isNotAuthorized($qr) ? $this->isNotAuthorized($qr) : $qr->delete();;
    }


    protected function isNotAuthorized($qr)
    {
        if(Auth::user()->id != $qr->user_id){
            return $this->error('', 'You are not authorized to view this QR code', 401);
        }
    }
}
