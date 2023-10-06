<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getHistory($word): string
    {
        if ($this->history == null) {
            return $word;
        }
        return $this->history.','.$word;
    }
    public function getHistoryAndHintsLetters(): array
    {
        $history = explode(',', $this->history);
        $word = strtoupper($this->word);
        $letter = [];

        for ($i = 0; $i < count($history); $i++) {
            if ($history[$i] == $word) {
                for ($j = 0; $j < strlen($history[$i]); $j++) {
                    $letter[$i][$j] = 'text-success';
                }
            }
            else {
                for ($j = 0; $j < strlen($history[$i]); $j++) {
                    if (!$this->letter_hints) {
                        $letter[$i][$j] = 'text-white-50';
                    }
                    else if ($history[$i][$j] == $word[$j]) {
                        $letter[$i][$j] = 'text-success';
                    }
                    else if (str_contains($word, $history[$i][$j])) {
                        $letter[$i][$j] = 'text-warning';
                    }
                    else {
                        $letter[$i][$j] = 'text-white-50';
                    }
                }
            }
        }

        return [$history, $letter];
    }
}
