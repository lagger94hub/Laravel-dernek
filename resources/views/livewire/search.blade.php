<div>
    <input wire:model="search" name="search" type="text" class="input search-input" list="mylist" placeholder="Search Content..." />

    @if(!empty($query))
        <datalist id="mylist">
            @foreach($datalist as $rs)
                <option value="{{$rs->title}}">{{$rs->menu->title}}</option>
            @endforeach
        </datalist>
        @endif
</div>
