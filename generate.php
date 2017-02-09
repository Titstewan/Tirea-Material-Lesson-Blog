<?php
// Some php functions for generating the site
if (!defined('TLB'))
  die('No direct access...');

/* Get the first part of the syllable: Either a consonant or a consonant cluster
 * Does not take into consideration that it is possible to open a Na'vi syllable with no consonant
 */
function getInitial() {
  $type;
  $result;

  /* 70% of the time, the syllable will start with single letter
   * 30% of the time, the syllable will start with a consonant cluster
   */
  if (rand(0,100) <= 70) {
    $type="single";
  } else {
    $type="cluster";
  }

  /* single consonant starts the syllable
   * The way this is done, it appears that as we go down this list, they get more common
   */
  if ($type == "single") {

    $rn = rand(0, 100);
    if ($rn <= 4) { $result = "px"; }
    else if ($rn <= 8) { $result = "tx"; }
    else if ($rn <= 12) { $result = "kx"; }
    else if ($rn <= 17) { $result = "p"; }
    else if ($rn <= 22) { $result = "t"; }
    else if ($rn <= 27) { $result = "k"; }
    else if ($rn <= 32) { $result = "ts"; }
    else if ($rn <= 37) { $result = "f"; }
    else if ($rn <= 42) { $result = "s"; }
    else if ($rn <= 47) { $result = "h"; }
    else if ($rn <= 52) { $result = "v"; }
    else if ($rn <= 57) { $result = "z"; }
    else if ($rn <= 62) { $result = "m"; }
    else if ($rn <= 67) { $result = "n"; }
    else if ($rn <= 72) { $result = "ng"; }
    else if ($rn <= 77) { $result = "r"; }
    else if ($rn <= 82) { $result = "l"; }
    else if ($rn <= 87) { $result = "w"; }
    else if ($rn <= 92) { $result = "n"; }
    else { $result = "'"; }

  // consonant cluster starts the syllable
  } else {
    $ro = rand(1, 3);

    // start with f
    if ($ro == 1) {
      $rp = rand(1, 100);
      if ($rp <= 5) { $result = "fpx"; }
      else if ($rp <= 11) { $result = "fkx"; }
      else if ($rp <= 16) { $result = "ftx"; }
      else if ($rp <= 25) { $result = "ft"; }
      else if ($rp <= 33) { $result = "fp"; }
      else if ($rp <= 42) { $result = "fk"; }
      else if ($rp <= 50) { $result = "fm"; }
      else if ($rp <= 57) { $result = "fn"; }
      else if ($rp <= 63) { $result = "fng"; }
      else if ($rp <= 70) { $result = "fr"; }
      else if ($rp <= 78) { $result = "fl"; }
      else if ($rp <= 86) { $result = "fw"; }
      else if ($rp <= 94) { $result = "fy"; }
      else { $result = "fr"; }

    // start with s
    } else if ($ro == 2) {
      $rp = rand(1, 100);
      if ($rp <= 5) { $result = "spx"; }
      else if ($rp <= 11) { $result = "skx"; }
      else if ($rp <= 16) { $result = "stx"; }
      else if ($rp <= 25) { $result = "st"; }
      else if ($rp <= 33) { $result = "sp"; }
      else if ($rp <= 42) { $result = "sk"; }
      else if ($rp <= 50) { $result = "sm"; }
      else if ($rp <= 57) { $result = "sn"; }
      else if ($rp <= 63) { $result = "sng"; }
      else if ($rp <= 70) { $result = "sr"; }
      else if ($rp <= 78) { $result = "sl"; }
      else if ($rp <= 86) { $result = "sw"; }
      else if ($rp <= 94) { $result = "sy"; }
      else  { $result = "sr"; }

    // start with ts
    } else if ($ro == 3) {
      $rp = rand(1, 100);
      if ($rp <= 5) { $result = "tspx"; }
      else if ($rp <= 11) { $result = "tskx"; }
      else if ($rp <= 16) { $result = "tstx"; }
      else if ($rp <= 25) { $result = "tst"; }
      else if ($rp <= 33) { $result = "tsp"; }
      else if ($rp <= 42) { $result = "tsk"; }
      else if ($rp <= 50) { $result = "tsm"; }
      else if ($rp <= 57) { $result = "tsn"; }
      else if ($rp <= 63) { $result = "tsng"; }
      else if ($rp <= 70) { $result = "tsr"; }
      else if ($rp <= 78) { $result = "tsl"; }
      else if ($rp <= 86) { $result = "tsw"; }
      else if ($rp <= 94) { $result = "tsy"; }
      else {$result = "tsr";}
    }
  }
  return $result;
}

// Get a vowel or diphthong as the center of the syllable
function getNucleus() {
  $isDiphthong;
  $result;

  //randomly select whether vowel or diphthong
  if (rand(0,100) > 20) {
    $isDiphthong="kehe";
  } else {
    $isDiphthong="srane";
  }

  // randomly select a diphthong
  if ($isDiphthong == "srane") {
    $rx = rand(0, 100);
    if ($rx <= 25) { $result = "ew"; }
    else if ($rx <= 50) { $result = "aw"; }
    else if ($rx <= 75) { $result = "ay"; }
    else if ($rx <= 100) { $result = "ey"; }

  // randomly select a vowel
  } else {
    $ry = rand(1, 100);
    if ($ry <= 25) { $result = "a"; }
    else if ($ry <= 40) { $result = "e"; }
    else if ($ry <= 55) { $result = "o"; }
    else if ($ry <= 70) { $result = "u"; }
    else if ($ry <= 80) { $result = "ì"; }
    else if ($ry <= 85) { $result = "ä"; }
    else { $result = "a"; }
  }
  return $result;
}

// Get a consonant (or not) to end the syllable with
function getCoda() {
  $result;
  $rz = rand(0, 320);

  if ($rz <= 4) { $result = "px"; }
  else if ($rz <= 8) { $result = "tx"; }
  else if ($rz <= 12) { $result = "kx"; }
  else if ($rz <= 20) { $result = "p"; }
  else if ($rz <= 28) { $result = "t"; }
  else if ($rz <= 44) { $result = "k"; }
  else if ($rz <= 49) { $result = "k"; }
  else if ($rz <= 58) { $result = "m"; }
  else if ($rz <= 70) { $result = "n"; }
  else if ($rz <= 76) { $result = "ng"; }
  else if ($rz <= 80) { $result = "r"; }
  else if ($rz <= 85) { $result = "l"; }
  else { $result=""; } // syllable will end with the vowel from getNucleus()

  return $result;
}

/* Validate the input vars from the URL - No ridiculousness this time
 * 1 <= [$a, $b, $c] <= 4
 */
function valid($a, $b, $c) {
  /* a, b, c not set, usually a fresh referal from index.php
   * Requiring at lesat index.php?page=generator&a=1&b=1&c=1 is so lame. So having unset abc is valid
   * Also happens if any or all elements in form are not selected and submitted. Should also be valid
   */
  if (!isset($a) || !isset($b) || !isset($c)) {
    return true;
  }

  // lolwut, zero syllables? Negative syllables?
  if ($a < 1 || $b < 1 || $c < 1) {
      return false;

  // Probably Vawmataw or someone trying to be funny by generating HRH.gif amounts of syllables
  } else if ($a > 4 || $b > 4 || $c > 4) {
    return false;

  // they are all set and with values between and including 1 thru 4
  } else {
    return true;
  }

}

/* Main function to generate the names
 * Echo a generated name and the user form and footer
 * Get vars from URL or form to generate another name
 */
function name_gen() {
  echo '<h2>';

  $a = $_REQUEST["a"]; // number of syllables in the First name
  $b = $_REQUEST["b"]; // number of syllables in the Family name
  $c = $_REQUEST["c"]; // number of syllables in the Parent's name

  // No funny business, y'all. :P
  if (!valid($a, $b, $c)) {
    echo 'Nice try. ;D </h2>';
    return;
  }

  $k;
  while ($k <= $_REQUEST["k"] -1) { // Do entire generator process k times
    $i=0;

    // BUILD FIRST NAME
    echo ucfirst(getInitial().getNucleus()); // echo First syllable: CV
    while ($i <= $a - 2) {
      echo getInitial().getNucleus(); // echo some more CV until $a syllables
      $i++;
    }
    echo getCoda(); // Maybe end the syllable with something, maybe not

    $i=0; // reset counter back to 0 for next part of the name

    echo " te ";

    // BUILD FAMILY NAME
    echo ucfirst(getInitial().getNucleus()); // CV
    while ($i <= $b - 2) {
      echo getInitial().getNucleus(); // CV
      $i++;
    }
    echo getCoda(); // C or None

    $i=0; // reset again for last part of name

    echo " ";

    // BUILD PARENT'S NAME
    echo ucfirst(getInitial().getNucleus());
    while ($i <= $c - 2) {
      echo getInitial().getNucleus();
      $i++;
    }
    echo getCoda();$i=0;

    echo "'it";

    // 50/50 chance of male/female name; TODO: Possibly make this something that the user can choose?
    if (rand(0,1)==0) {
      echo "an";
    } else {
      echo "e";
    }

    echo "<br />"; // Need this to ensure each name generated is on its own line
    $k++; // Increment number of times entire process finished
  }

  echo '</h2>'; // close h4 tag enclosing generated names

  // echo the user input form and generator info footer
  echo '<br />
  <hr>

  <style>select{display:block;}</style>

  <div class="row">
    <form class="col s12" name="sform" action="index.php" method="get">
      <input type="hidden" name="page" value="generator">

      <div class="row">
        <div class="input-field col s12 l4">
          <select name="a">
            <option value="" disabled selected>First Name # of Syllables</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12 l4">
          <select name="b">
            <option value="" disabled selected>Family Name # of Syllables</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12 l4">
          <select name="c">
            <option value="" disabled selected>Parent&apos;s Name # of Syllables</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12 l4">
          <select name="k">
            <option value="" disabled selected>Number of Names to Generate</option>
            <option value="1">1</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
        </div>
      </div>

      <button class="btn waves-effect waves-light amber black-text" type="submit">
        Generate!
        <i class="material-icons right">send</i>
      </button>

    </form>

  </div>

  <div style="margin-top: 18px; text-align: center; border-top: 1px solid #eeeeee; padding-top: 5px; ">
    <a href="http://forum.learnnavi.org/index.php?msg=566249">
      Web-based Na\'vi Name Generator!
    </a> by Uniltìrantokx te Skxawng
  </div>';
}
?>
