<div>
    <div class="flex justify-between relative md:mb-4 mb-3">
        <div class="flex-1">
            <h2 class="text-2xl font-semibold"> All Complaints </h2>
        </div>
        <button type="button" @if($openForm) disabled @endif wire:click="addingComplaint"
            class="flex items-center justify-center h-9 lg:px-5 px-2 rounded-md bg-blue-600 text-white space-x-1.5 absolute right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="md:block hidden"> New Complaint </span>
        </button>
    </div>
    @if($openForm)
    <div>
        <div class="flex flex-1 items-start space-x-4 p-5">
            <div class="w-full md:inline-flex gap-3">
                <div class="w-full md:w-1/3 mt-3 md:mt-0">
                    <div class="line">
                        <select id="title" name="title" wire:model='title' class="line__input">
                            <option value="">-- select a title --</option>
                            <option value="Physical Abuse">Physical Abuse</option>
                            <option value="Sexual Abuse">Sexual Abuse</option>
                            <option value="Verbal/Emotional Abuse">Verbal/Emotional Abuse</option>
                            <option value="Mental/Psychological Abuse">Mental/Psychological Abuse</option>
                            <option value="Financial/Economic Abuse">Financial/Economic Abuse</option>
                            <option value="Cultural/Identity Abuse">Cultural/Identity Abuse</option>
        
                        </select>
                        {{-- <span for="title" class="line__placeholder"> </span> --}}
                    </div>
                    @error('title') <span class="text-red-600 font-bold text-xs">{{$message}}</span> @enderror
                </div>
                <div class="w-full md:w-2/3 mt-3 md:mt-0">
                    <div class="line">
                        <input class="line__input" id="contact_number" name="contact_number" wire:model='contact_number'
                            type="number" value="" autocomplete="off" placeholder="Contact number">
                        {{-- <span for="contact_number" class="line__placeholder">  </span> --}}
                    </div>
                    @error('contact_number') <span class="text-red-600 font-bold text-xs">{{$message}}</span> @enderror
                </div>
            </div>
        </div>
        <div class="line h-32 mx-5">
            <textarea class="line__input h-32" id="" name="description" wire:model='description' type="text" value=""
                autocomplete="off" placeholder="briefly explain the complaint"></textarea>
            {{-- <span for="username" class="line__placeholder">  </span> --}}
        </div>
        @error('description') <span class="text-red-600 font-bold text-xs">{{$message}}</span> @enderror
        <div class="line h-32 mx-5">
            <p>Our dedicated complaint management team will take action as soon as after the clear approval of the
                complaint. We contact to the given number if any further informations requires.</p>
        </div>
        <div class="flex items-center w-full justify-end p-3">
            <div class="flex space-x-2">
                <button type="button" wire:click='addComplaint'
                    class="bg-blue-600 flex h-9 items-center justify-center rounded-md text-white px-5 font-medium">
                    Submit </button>
            </div>
        </div>
    </div>
    @endif
    <hr />
    <table class="table w-full mt-3">
        <thead>
            <tr>
                <th style="width: 5%">#</th>
                <th style="width: 80%">Description</th>
                <th style="width: 15%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($complaints as $complaint)    
            <tr class="border-t">
                <td>{{$loop->iteration}}</td>
                <td>
                    <strong>{{$complaint->title}} @ {{$complaint->created_at->format('d F Y h:i a')}}</strong>
                    <br />
                    <p>{{$complaint->complaint}}</p>
                </td>
                <td>
                    <div class="flex items-center gap-3">
                        <div>{{$complaint->status}}</div>
                        @if($complaint->status !== 'waiting')
                        @php
                        $complaintTitle = 'C/B:'.App\Models\User::find($complaint->user_id)->name.'<small> ('.$complaint->status.')</small>';
                        $detailComplaint = '';
                        foreach (App\Models\FollowUp::where('complaint_id', $complaint->id)->get() as $followup) {
                            $detailComplaint .= '<small>'.$followup->description.'<br /><strong>by '.App\Models\User::find($followup->user_id)->name.' @ '.$followup->created_at->format('d F \'y h:i a').'</strong></small><hr />';
                        }
                        @endphp
                        <button type="button" onclick="showDetailComplaint('{{json_encode($complaintTitle)}}', `{{$detailComplaint}}`)"
                            class="flex items-center justify-center h-6 w-6 rounded-md bg-blue-600 text-white space-x-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                            </svg>
                        </button>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
             <tr>
                <td colspan="3">No Complaints found!</td>
            </tr>   
            @endforelse
        </tbody>
    </table>
</div>

