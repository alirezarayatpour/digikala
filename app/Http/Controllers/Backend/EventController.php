<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $event = Event::query()->orderBy('id', 'DESC')->paginate(10);
      return view('admin.pages.event.index', compact('event'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.pages.event.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreEventRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreEventRequest $request)
   {
      $imageName = 'event' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move('images/event', $imageName);

      $event = new Event([
         'image' => $imageName,
         'link' => $request->get('link'),
         'text' => $request->get('text'),
      ]);

      $event->save();
      $message = "رویداد جدید با موفقیت افزوده شد";
      return redirect()->route('event.index')->with('success', $message);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Backend\Event  $event
    * @return \Illuminate\Http\Response
    */
   public function show(Event $event)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Backend\Event  $event
    * @return \Illuminate\Http\Response
    */
   public function edit(Event $event)
   {
      return view('admin.pages.event.edit', compact('event'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateEventRequest  $request
    * @param  \App\Models\Backend\Event  $event
    * @return \Illuminate\Http\Response
    */
   public function update(UpdateEventRequest $request, Event $event)
   {
      if ($request->file('image')) {
         $imageName = 'event' . '-' . time() . '.' . $request->image->getClientOriginalExtension();
         $request->image->move('images/event', $imageName);
         $event->image        =   $imageName;
      } else {
         unset($imageName);
      }

      $event->link        =   $request->link;
      $event->text        =   $request->text;

      $event->save();
      $message = "ویرایش رویداد انجام شد";
      return redirect()->route('event.index')->with('success', $message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Backend\Event  $event
    * @return \Illuminate\Http\Response
    */
   public function destroy(Event $event)
   {
      $event->delete();
      $message = "حذف رویداد انجام شد";
      return redirect()->route('event.index')->with('success', $message);
   }

   /**
    * @param Event $event
    */
   public function status(Event $event)
   {
      if ($event->status === 1) {
         $event->status = 0;
      } elseif ($event->status === 0) {
         $event->status = 1;
      }
      $event->save();
      return redirect()->back();
   }
}
