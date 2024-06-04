<?php

namespace App\Http\Controllers\Backend;
use App\Models\MenuModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getMenu()
    {
        $menus = MenuModel::all();
        $title= "Danh sách menu";
        return view('backend.menu.getMenu', compact('menus','title'));
    }

    public function createForm()
    {
        $title= "Thêm mới menu";
        return view('backend.menu.create',compact('title'));
    }

    public function create(Request $request)
    {
        $menu = new MenuModel();
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->icon = $request->icon;
        $menu->status = $request->status;
        $menu->note = $request->note;
        $menu->save();
        return redirect()->route('menu.getMenu')->with('success', "Thêm thành công!");
    }

    public function edit($id)
    {
        $title= "Chỉnh sửa thông tin menu";
        $menu = MenuModel::findOrFail($id);
        return view('backend.menu.edit', compact('menu','title'));
    }

    public function update(Request $request, $id)
    {
        $menu = MenuModel::findOrFail($id);
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->icon = $request->icon;
        $menu->status = $request->status;
        $menu->note = $request->note;
        $menu->save();
        return redirect()->route('menu.getMenu')->with('success', 'Sửa menu thành công.');
    }

    public function delete($id)
    {
        $menu = MenuModel::findOrFail($id);
        $menu->delete();
        return redirect()->route('menu.getMenu')->with('success', 'Xóa menu thành công.');
    }
}
