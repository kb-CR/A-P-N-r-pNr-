<?php
 public static function Factorial(Int $X): Int
 {
  return $X > 1 ? self::Factorial($X - 1) * $X : $X;
 }

 /*
  * https://music.youtube.com/watch?v=9mMhWUM0KHE
  * 
  * $AName, $TagHeight, $UnionAcross
  */
 public function Expand(String $A, Int $TH = 1, String $UX = Null): ArrayObject
 {
  $AUTHXN = mb_str_split($A, $TH, $UX);
  $ANXT = mb_strlen($A, $UX);
  $L = $AUTHXN;
  $NS = [$A => null];
  for ($a = self::Factorial($ANXT), $b = count($NS), $e = $f = 0; $a > $b; $f++) {
   for ($d = $ANXT - 1, $c = 0; $c < $d && $d > $c; $c++, $d--) {
    if ($e) {
     do {
      $c = rand(0, $ANXT - 1);
      $M = max(range($c, 0), range($c, $ANXT - 1));
      $d = rand($c, $M[rand(0, count($M) - 1)]);
     } while (strcmp($AUTHXN[$d], $AUTHXN[$c]) === 0);
    }
    $L = array_replace($L, [
     $c => $L[$d],
     $d => $L[$c]
    ]);
    $N = join('', $L);
    if ($e++) {
     $L = array_reverse($L);
     $A = join('', $L);
     if (!isset($NS[$A]) || !isset($NS[$N])) {
      if ($b++ && !isset($NS[$N])) {
       $NS[$N] = $b;
      }
      $NS[$A] = $b;
      $e = 0;
     }
    }
   }
   if ($a == $b || $e > 1) {
    $b = count($NS);
   }
  }
  return new ArrayObject($NS);
 }
