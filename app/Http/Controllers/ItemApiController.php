<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ItemApiController extends Controller
{
    public function index(Request $request)
    {
        // $request->user()->tokenCan('view');
        $items = Item::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        // $request->user()->tokenCan('create');

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'key' => ['required', 'string', 'max:25', Rule::unique('items')],
        ]);

        $item = Item::create($data);
        return response()->json($item, 201);
    }

    public function show(Item $item)
    {
        // $request->user()->tokenCan('view');
        return response()->json($item);
    }

    public function update(Request $request, Item $item)
    {
        // $request->user()->tokenCan('update');

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'key' => ['required', 'string', 'max:25', Rule::unique('items')->ignore($item)],
        ]);

        $item->update($data);
        return response()->json($item);
    }

    public function destroy(Request $request, Item $item)
    {
        // $request->user()->tokenCan('delete');

        $item->delete();
        return response()->noContent();
    }
}
