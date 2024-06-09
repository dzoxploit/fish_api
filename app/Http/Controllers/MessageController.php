<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use Illuminate\Validation\Rule;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        // Return a list of candidates
        try{
            
            if($request->get('search') != null){
                $searchQuery = $request->get('search');
                
                $messages = Messages::where('title', 'LIKE', '%' . $searchQuery . '%')
                                    ->orWhere('description','LIKE', '%' . $searchQuery . '%')
                                    ->orderBy('id','DESC') // Load relasi user
                                    ->paginate(30);

                return response()->json($messages, 200);    
            }else{
                $messages= Messages::orderBy('id','DESC')->paginate(30);
                return response()->json($messages, 200);
            }

        }catch(\Exception $e){
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try{
            $messages = Messages::find($id);
            if (!$messages) {
                return response()->json(['message' => 'Messages not found'], 404);
            }
            return response()->json($messages, 200);
        }catch(\Exception $e){
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {

        try{
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
            ]);

            Messages::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);

            return response()->json(['message' => 'User and Message created successfully'], 201);
        }catch(\Exception $e){
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {

        try{
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
            ]);


            // Cari pengguna (user) yang akan diupdate
            $message = Messages::findOrFail($id);
            $message->title = $request->input('title');
            $message->description = $request->input('description');
            $message->save();

            return response()->json(['message' => 'Message updated successfully'], 201);
        }catch(\Exception $e){
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try{
            $message = Messages::find($id);
            $message->delete();
            return response()->json(['message' => 'Message deleted successfully']);
        } catch(\Exception $e) {
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }
}
