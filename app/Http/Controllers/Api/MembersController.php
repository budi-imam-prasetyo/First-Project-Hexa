<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Members;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $query = Members::with(['class' => function ($query) {
            $query->withTrashed();
        }]);
        
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('address', 'like', "%{$search}%");
            });
        }
        
        if ($request->has('gender')) {
            $query->where('gender', $request->gender);
        }
        
        if ($request->has('class')) {
            $query->where('class_id', $request->class);
        }
        
        if ($request->has('sort_by')) {
            $sort = $request->sort_by === 'latest' ? 'desc' : 'asc';
            $query->orderBy('created_at', $sort);
        }
        
        $limit = $request->limit;
        $members = $query->paginate($limit);

        $members->through(function ($member) {
            return [
                'id' => $member->id,
                'class' => $member->class ? [
                    'id' => $member->class->id,
                    'name' => $member->class->name,
                    'description' => $member->class->description,
                    'created_at' => $member->class->created_at,
                    'updated_at' => $member->class->updated_at,
                    'deleted_at' => $member->class->deleted_at,
                ] : null,
                'first_name' => $member->first_name,
                'last_name' => $member->last_name,
                'email' => $member->email,
                'gender' => $member->gender,
                'address' => $member->address,
                'created_at' => $member->created_at,
                'updated_at' => $member->updated_at,
            ];
        });

        return response()->json($members);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
