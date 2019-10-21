<answer :answer="{{ $answer }}" inline-template>
<div class="media post">
        @include('shared._vote',[
           'model' => $answer
        ])
        <div class="media-body">
                <form v-if="editing" @submit.prevent="update">
                    <div class="form-group">
                        <textarea required rows="10" v-model="body" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-sm btn-primary" :disabled="isInvalid" @click="editing = false">Update</button>
                    <button class="btn btn-sm btn-outline-secondary" @click="cancel" type="button">Cancel</button>
                    
                </form>
                <div v-else>
                    <div v-html="bodyHtml"></div>
                    <div class="row">
                        <div class="col-4">
                            <div class="ml-auto">
                                @can ('update',$answer)
                                    <a @click.prevent="edit()" class="btn btn-sm btn-outline-info">Edit</a>
                                @endcan
                                @can ('delete',$answer)
                                    <button class                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ="btn btn-sm btn-outline-danger" @click="destroy">Delete</button>
                                @endcan
                            </div>
                        </div>
                        <div class="col-4"></div>
                                            
                        <div class="col-4">
                            <user-info :model="{{ $answer }}" label="Answered"></user-info>
                        </div>                   
                    </div>
                </div>                       
        </div>
</div>
</answer>