<?php

namespace App;
use Illuminate\Support\Str;
use Parsedown;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use VotableTrait;
    
    protected $fillable = ['title','body'];
    protected $appends = ['created_date','is_favorited','favorites_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class)->orderBy('votes_count','DESC');;
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimeStamps(); //,'user_id','question_id');
    }

    public function isFavorited()
    {
        return $this->favorites()->where('user_id', auth()->id())->count() > 0;
    }

    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }

    public function setTitleAttribute($value)
    {       
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute()
    {
        return route("questions.show",$this->slug);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if($this->answers_count > 0){
            if($this->best_answer_id){
                return 'answer-accepted';
            }
            return 'answered';
        }

        return "unanswered";
    }

    public function acceptBestAnswer(Answer $answer)
    {
        $this->best_answer_id = $answer->id;
        $this->save();
    }
    
    public function getBodyHtmlAttribute()
    {
        return clean($this->bodyHtml());
    }

    public function getExcerptAttribute()
    {
        return str_limit(strip_tags($this->bodyHtml()), 300);
    }
    
   private function bodyHtml()
   {
        return \Parsedown::instance()->text($this->body);
   }

   public function setBodyAttribute($value)
   {
       $this->attributes['body'] = clean($value);
   }
}
