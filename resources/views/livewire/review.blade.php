<div>
    @if( session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <h2>What do you think about the post ??</h2>
    <table width="100%" border="0">
        <div class="col-md-9 col-md-offset-0">
            <tr>
                <td width="77%">
                    <div class="">
                        <form class="form-horizontal" wire:submit.prevent="store">
                            <fieldset>

                                <!-- Name input-->
                                <div class="form-group">
                                    <div class="col-md-9">
                                        <input id="name" wire:model="subject" type="text" placeholder="Subject"
                                               class="form-control"/>
                                        @error('subject') <span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>


                                <!-- Message body -->
                                <div class="form-group">
                                    <div class="col-md-9">
                                        <textarea class="form-control" id="message" wire:model="review"
                                                  placeholder="Review" rows="5"></textarea>
                                        @error('review') <span class="text-danger">{{$message}}</span>@enderror

                                    </div>
                                </div>


                                <!-- Rating -->
                                <div class="form-group">
                                    <fieldset class="rating">
                                        <legend>Please rate:</legend>
                                        <input type="radio" id="star5" wire:model="rate" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                                        <input type="radio" id="star4" wire:model="rate" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                                        <input type="radio" id="star3" wire:model="rate" value="3" /><label for="star3" title="Meh">3 stars</label>
                                        <input type="radio" id="star2" wire:model="rate" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                                        <input type="radio" id="star1" wire:model="rate" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                                    </fieldset>
                                </div>
                                @error('rate')<span class="text-danger">{{$message}}</span>@enderror

                </td>
            </tr>
            <tr>
                <td align="center" valign="top" width="23%">
                    <!-- Form actions -->
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            @auth
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>

                            @else
                                <a href="/login" class="btn btn-primary"> Login to submit review</a>
                            @endauth

                            <button type="reset" class="btn btn-secondary btn-md">Clear</button>
                        </div>
                    </div>
                </td>

            </tr>


            </fieldset>

            </form>
        </div>
</div>
</tr>
</table>


</div>


