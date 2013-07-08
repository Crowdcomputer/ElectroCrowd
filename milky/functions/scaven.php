<?php

if (!defined('SCAVEN_PHP_INCLUDED')) {
    define('SCAVEN_PHP_INCLUDED', true);

//������� � ����������
    $month_arr = array('�����-X', '������', '�������', '����', '������', '���', '����', '����', '������', '��������', '�������', '������', '�������');
    $month_arr_1 = array('������-X', '������', '�������', '�����', '������', '���', '����', '����', '�������', '��������', '�������', '������', '�������');
    $month_arr_s = array('�����-x', '������', '�������', '����', '������', '���', '����', '����', '������', '��������', '�������', '������', '�������');
    $weekday_arr = array('�����������', '�����������', '�������', '�����', '�������', '�������', '�������');
    $weekday_arr_as = array('��', '��', '��', '��', '��', '��', '��');
    /*
      $ru_lo_arr		= array ('a', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�');
      $ru_hi_arr		= array ('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�');
      // */

//����������� ��������, ��������, ���������� � ����������� ����
    function pre($var, $title=NULL, $return=false) {
        $str = '';
        $str.="\n" . '<pre>';
        if ($title)
            $str.='[' . $title . '] - ';
        if (is_array($var) || is_object($var) || is_resource($var))
            $str.=print_r($var, true);
        else
            $str.='[' . $var . ']';
        $str.='</pre>' . "\n";
        if ($return) {
            return $str;
        } else {
            echo $str;
            return true;
        }
    }

//������� ��������� ������
    function colorize($tr1, $tr2, $tg1, $tg2, $tb1, $tb2) {
        $r = strval(dechex(rand($tr1, $tr2)));
        $g = strval(dechex(rand($tg1, $tg2)));
        $b = strval(dechex(rand($tb1, $tb2)));
        if (strlen($r) == 1)
            $r = "0$r";
        if (strlen($g) == 1)
            $g = "0$g";
        if (strlen($b) == 1)
            $b = "0$b";
        return "$r$g$b";
    }

    function colorize3_arr($tr1, $tr2, $tg1, $tg2, $tb1, $tb2) {
        if (!function_exists('resval')) {

            function resval($v) {
                if ($v > 255)
                    $v = 255; elseif ($v < 0)
                    $v = 0;
                $t = strval(dechex($v));
                if (strlen($t) == 1)
                    $t = "0$t";
                return $t;
            }

        }
        $clrarr = array();
        $r1 = rand($tr1, $tr2);
        $g1 = rand($tg1, $tg2);
        $b1 = rand($tb1, $tb2);
        $clrarr[] = resval($r1 - 48) . resval($g1 - 48) . resval($b1 - 48);
        $clrarr[] = resval($r1) . resval($g1) . resval($b1);
        $clrarr[] = resval($r1 + 32) . resval($g1 + 32) . resval($b1 + 32);
        return $clrarr;
    }

    function colorize_hi() {
        return colorize(128, 255, 128, 255, 128, 255);
    }

    function colorize_low() {
        return colorize(0, 64, 0, 64, 0, 64);
    }

//��������� float'��
    function float_compare($a, $b, $epsilon=0.01) {
        return (abs($a - $b) < $epsilon) ? true : false;
    }

//������ ���������������� � ������������� ����� ��� ������� $x
    function scv_ru_plural($x, $w1, $w2to4, $ww) {
        $xx = $x % 10;
        $xxx = $x % 100;
        if ($xxx > 10 && $xxx < 20)
            return $ww; elseif ($xx == 1)
            return $w1; elseif ($xx > 1 && $xx < 5)
            return $w2to4; else
            return $ww;
    }

//������� empty(trim( ... ))
    function emptytrimstr($tstr) {
        if (trim($tstr) === '')
            return TRUE; else
            FALSE;
    }

;

//��������� ������ � int, ���� ������ ������ - ���������� NULL (� �� ����)
    function intvalnull($var) {
        if (emptytrimstr($var))
            return NULL; else
            return intval(trim($var));
    }

;

//������� ��� �������� �������� �������� � sql + �������� null ���� ��� �������������. ��� ������������� ���� ������� ������� ������� �� ����
    function intvalnullsql($var) {
        if (emptytrimstr($var))
            return 'NULL'; else
            return '\'' . intval(trim($var)) . '\'';
    }

;

//������� mysql_escape_string ��� mssql
//TODO: ������� []s
    function scv_esc($tstr) {
        if (emptytrimstr($tstr))
            return NULL;
        else
            return htmlspecialchars(trim($tstr), ENT_QUOTES);
    }

;

    function xmysql_escape_string($s) {
        $sl = strlen($s);
        for ($a = 0; $a < $sl; $a++) {
            $c = substr($s, $a, 1);
            switch (ord($c)) {
                case 0:
                    $c = "\\0";
                    break;
                case 10:
                    $c = "\\n";
                    break;
                case 9:
                    $c = "\\t";
                    break;
                case 13:
                    $c = "\\r";
                    break;
                case 8:
                    $c = "\\b";
                    break;
                case 39:
                    $c = "\\'";
                    break;
                case 34:
                    $c = "\\\"";
                    break;
                case 92:
                    $c = "\\\\";
                    break;
                case 37:
                    $c = "\\%";
                    break;
                case 95:
                    $c = "\\_";
                    break;
            }
            $s2.=$c;
        }
        return $s2;
    }

//������ ������� ��� ������������ ���� (SQL)
    function scv_date($col, $style=106) {
        //$col=scv_esc(); //????
        if ($style == -1)
            return 'CONVERT(varchar,' . $col . ',106)+\' \'+CONVERT(varchar,' . $col . ',108)';
        elseif ($style == -2)
            return 'CONVERT(varchar,' . $col . ',106)+\' \'+LEFT(CONVERT(varchar,' . $col . ',108), 5)';
        else
            return 'CONVERT(varchar, ' . $col . ', ' . $style . ')';
    }

//������� ��������� ������ ���� � �������� ����� �� ����� (������ pathinfo) �-� './report/report.php; [dirname] => ./report [basename] => report.php [filename] => report [extension] => php
    function scv_pathinfo($path) {
        $basename = basename($path);
        $dirname = dirname($path);
        $rdotpos = strrpos($basename, '.');
        $extension = substr($basename, $rdotpos + 1);
        $filename = substr($basename, 0, $rdotpos);
        return array('dirname' => $dirname, 'basename' => $basename, 'filename' => $filename, 'extension' => $extension);
    }

    function scv_file_error($error) {
        switch ($error) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_INI_SIZE:
                echo '���� ������ ����������� ������� (UPLOAD_ERR_INI_SIZE)';
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo '���� ������ ����������� ������� (UPLOAD_ERR_FORM_SIZE)';
                break;
            case UPLOAD_ERR_PARTIAL:
                echo '���� ��� �������� �� ��������� (UPLOAD_ERR_PARTIAL)';
                break;
            case UPLOAD_ERR_NO_FILE:
                echo '���� �� ������ (UPLOAD_ERR_NO_FILE)';
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo '������ �������� ����� (UPLOAD_ERR_NO_TMP_DIR)';
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo '������ �������� ����� (UPLOAD_ERR_CANT_WRITE)';
                break;
            default:
                echo '����������� ������ �������� �����';
        }
    }

    function scv_max_file_size() {
        $inimaxsize = ini_get('upload_max_filesize');
        $maxsize = $inimaxsize;
        if (!is_numeric($maxsize)) {
            if (strpos($maxsize, 'M') !== false)
                $maxsize = intval($maxsize) * 1024 * 1024;
            elseif (strpos($maxsize, 'K') !== false)
                $maxsize = intval($maxsize) * 1024;
            elseif (strpos($maxsize, 'G') !== false)
                $maxsize = intval($maxsize) * 1024 * 1024 * 1024;
        }
        return '<input type=\'hidden\' name=\'MAX_FILE_SIZE\' value=\'' . $maxsize . '\' />';
    }

//������ ��������� ����������, ���� ������ ����� ������ �� �������� ������� (fastcgi_read_timeout 60 ��� keepalive_timeout )
    function scv_alivearewe($str=' ') {
        //echo ' ['.date('i').':'.date('s').'] ';
        echo $str; //�� ������ ������� ������ �������� - ��������� ������ %)))
        ob_flush();
        flush();
    }

//��������
    function nhashxencode($pwd, $login) {
        $x = md5(md5(strrev($pwd)) . md5($login));
        $d0 = (dechex(15 - hexdec($x{7}))) . $x{14} . (dechex(15 - hexdec($x{21})));
        $d1 = (dechex(15 - hexdec($x{24}))) . $x{17} . (dechex(15 - hexdec($x{10}))) . $x{3} . (dechex(15 - hexdec($x{4})));
        return $d0 . $x . $d1;
    }

    function nhashxcheck($str, $id) {
        $v = mssql_fetch_array(mssql_query('SELECT [login], [pwd] FROM [user] WHERE [id]=\'' . intval($id) . '\''));
        $pwdtruel = substr($v['pwd'], 3, 32);
        if (md5(md5(strrev($str)) . md5($v['login'])) == $pwdtruel) {
            return true;
        } else {
            return false;
        }
    }

//��������� �������
    function genpwd($tt=0) {
        if ($tt)
            srand($tt);
        $pwdstr = '';
        $pwdstrlen1 = 4;
        for ($i = 0; $i < $pwdstrlen1; $i++) {
            $pwdstr.=chr(rand(ord('a'), ord('z')));
        }
        $pwdstr = str_shuffle($pwdstr);
        return $pwdstr;
    }

//ip ������������
    function getip() {
        if (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown'))
            $ip = getenv('HTTP_CLIENT_IP');

        elseif (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown'))
            $ip = getenv('HTTP_X_FORWARDED_FOR');

        elseif (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown'))
            $ip = getenv('REMOTE_ADDR');

        elseif (!empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown'))
            $ip = $_SERVER['REMOTE_ADDR'];

        else
            $ip = 'unknown';

        return($ip);
    }

// ������� ��� ���������� ���������� �� ���������
    /*
      $querystr	- ����� sql ������� ��� SELECT (���� '* FROM [table] WHERE blablabla'), ���� array-(0� ������� - ����� �� SELECT, 1� - �����)
      $div		- ���������� ��������� �� ��������
      $curpage	- ������� ��������
      $allnum		- ����� ������� � �������
      $formatfunc	- �������� �-��, ������� ��������� fetch_row � ��� ���-��, ����������� �� �� ��������
      $args		- ���. ��������� ��� �������
      // */
    function format_pages($query, $div, $curpage, $allnum, $formatfunc, $args=array()) {
        if (!is_array($args))
            $args = NULL;
        $curpage = max($curpage, 1);
        $div = max($div, 1);
        $curfirstentry = ($curpage - 1) * $div; //������ ������ ������� ��������
        if (ceil($allnum / $div) < $curpage) //���� ��������� �������� ������ ���������
            $fetchnum = 0; //������ �� �����������
        else
            $fetchnum=min($div * $curpage, $allnum); //����� ������ ������� ����� ��� ������� ����
        $need = min($div, max(0, $allnum - $curfirstentry)); //������� ������� ���� ��������
        if ($fetchnum) {
            $sql = is_array($query) ? $query[0] . ' SELECT TOP ' . $fetchnum . ' ' . $query[1] : 'SELECT TOP ' . $fetchnum . ' ' . $query;
            $q = mssql_query($sql); //������� ������
            mssql_data_seek($q, $curfirstentry); //��������� � ����������� ������
            for ($i = 0; $i < $need; $i++) {
                $var = mssql_fetch_array($q);
                $args_com = count($args) ? array_merge(array($var, $i), $args) : array($var, $i); //���������
                call_user_func_array($formatfunc, $args_com); //����� ������������� ������� � ����������� $args_new
            }
        }
    }

    function list_pages($div, $curpage, $allnum, $printpagefunc='', $printcurpagefunc='') {
        $curpage = max($curpage, 1);
        $lastpage = ceil($allnum / $div); //����� ��������� �������� min($allnum,1024)
        if (emptytrimstr($printpagefunc)) {
            if (!function_exists('t_list_pages_printpage')) {

                function t_list_pages_printpage($n) {
                    echo ' <a href=\'' . cururl('page=' . $n, array('page')) . '\'>' . $n . '</a>';
                }

            }
            $printpagefunc = 't_list_pages_printpage';
        }
        if (emptytrimstr($printcurpagefunc)) {
            if (!function_exists('t_list_pages_printcurpage')) {

                function t_list_pages_printcurpage($n) {
                    echo ' <font color=\'#111111\'><b>' . $n . '</b></font>';
                }

            }
            $printcurpagefunc = 't_list_pages_printcurpage';
        }

        for ($i = 1; $i <= $lastpage; $i++) {
            if ($i != $curpage)
                $printpagefunc($i);
            else
                $printcurpagefunc($i);
        }
    }

//������������ ����� �� ���������� �������� �/��� �����
    function limit_text(&$text, $limitsymbols=0, $limitlines=0) {
        $partly = false;
        $cctext = '';
        if ($limitlines > 0) {
            $lines = explode('<br />', str_replace(array("\r\n", "\r", "\n"), ' ', nl2br($text)));
            $cctext = $lines[0];
            for ($i = 1; $i < $limitlines; $i++) {
                if (isset($lines[$i]))
                    $cctext.= ( '<br>' . $lines[$i]);
            }
            if (isset($lines[$limitlines]))
                $partly = true;
        } else {
            $cctext = str_replace('<br />', '<br>', str_replace(array("\r\n", "\r", "\n"), ' ', nl2br($text)));
        }
        $text = $cctext;
        if ($limitsymbols > 0 && strlen($text) > $limitsymbols) {
            $cctext = wordwrap($cctext, $limitsymbols, "\r\n");
            $text = substr($text, 0, strpos($cctext, "\r\n", 0));
            $partly = true;
        }
        return $partly;
    }

//������� ��� ��������� �������� ��������� ������ �� ��
    function full_rel_name($tid, $table='user', $full=1) {
        $id = intval($tid);
        if ($table == 'department' || $table == 'dpt') {
            $title = $full & 2 ? 'title' : 'abbr';
            $tvar1 = mssql_fetch_array(mssql_query('SELECT ' . $title . ', comid FROM [department] WHERE id=\'' . $id . '\''), MSSQL_ASSOC);
            if ($full & 1) {
                $tvar2 = mssql_fetch_array(mssql_query('SELECT cc.' . $title . ' AS com, c.title AS city FROM company cc LEFT JOIN city c ON c.id=cc.cityid WHERE cc.id=' . $tvar1['comid']), MSSQL_ASSOC);
                return $tvar1[$title] . ' / ' . $tvar2['com'] . ' / ' . $tvar2['city'];
            } else {
                return $tvar1[$title];
            }
        } elseif ($table == 'direction' || $table == 'dir') {
            $title = $full & 2 ? 'title' : 'abbr';
            $tvar1 = mssql_fetch_array(mssql_query('SELECT dt.title, d.comid FROM [direction] d LEFT JOIN [direction_types] dt ON d.typeid=dt.id WHERE d.id=\'' . $id . '\''), MSSQL_ASSOC);
            if ($full & 1) {
                $tvar2 = mssql_fetch_array(mssql_query('SELECT cc.' . $title . ' AS com, c.title AS city FROM company cc LEFT JOIN city c ON c.id=cc.cityid WHERE cc.id=' . $tvar1['comid']), MSSQL_ASSOC);
                return $tvar1[$title] . ' / ' . $tvar2['com'] . ' / ' . $tvar2['city'];
            } else {
                return $tvar1[$title];
            }
        } elseif ($table == 'company' || $table == 'com') {
            $title = $full & 2 ? 'title' : 'abbr';
            $tvar1 = mssql_fetch_array(mssql_query('SELECT ' . $title . ', cityid FROM [company] WHERE id=\'' . $id . '\''), MSSQL_ASSOC);
            if ($full & 1) {
                $tvar2 = mssql_result(mssql_query('SELECT title FROM [city] WHERE id=\'' . $tvar1['cityid'] . '\''), 0, 0);
                return $tvar1[$title] . ' / ' . $tvar2;
            } else {
                return $tvar1[$title];
            }
        } elseif ($table == 'user' || $table == 'usr') {
            $tvar = mssql_fetch_array(mssql_query('SELECT sname, name, fname FROM [user] WHERE id=\'' . $id . '\''), MSSQL_ASSOC);
            if ($full & 1) {
                $return = $tvar['sname'] . ' ' . $tvar['name'] . ' ' . $tvar['fname'];
            } else {
                $return = $tvar['sname'] . ' ' . $tvar['name']{0} . '. ' . $tvar['fname']{0} . '.';
            }
            if ($full & 8) {
                $return = '<nobr>' . $return . '</nobr>';
            }
            if ($full & 2) {
                $tvar2 = mssql_result(mssql_query('SELECT dptid FROM [user] WHERE id=\'' . $id . '\''), 0, 0);
                $txt = array(0 => '', 1 => '');
                if ($full & 8) {
                    $txt[0] = '<font color=\'#AAAAAA\' size=-1>';
                    $txt[1] = '</font>';
                }
                $return .= $txt[0] . ' / ' . full_rel_name($tvar2, 'dpt', 1 + 2 * ($full & 4)) . $txt[1];
            }
            return $return;
        } elseif ($table == 'group' || $table == 'gr') {
            return mssql_result(mssql_query('SELECT title FROM [group] WHERE id=\'' . $id . '\''), 0, 0);
        } elseif ($table == 'post') {
            return mssql_result(mssql_query('SELECT title FROM [post] WHERE id=\'' . $id . '\''), 0, 0);
        } elseif ($table == 'city') {
            return mssql_result(mssql_query('SELECT title FROM [city] WHERE id=\'' . $id . '\''), 0, 0);
        } elseif ($table == 'status' || $table == 'stat') {
            return mssql_result(mssql_query('SELECT title FROM [user_status_types] WHERE id=\'' . $id . '\''), 0, 0);
        } elseif ($table == 'user_array') {
            $var1 = mssql_fetch_array(mssql_query('SELECT * FROM [user] u LEFT JOIN [user_info] ui ON u.id=ui.uid WHERE u.id=\'' . $id . '\''), MSSQL_ASSOC);
            $group = full_rel_name($var1['grid'], 'group', $full);
            $post = full_rel_name($var1['postid'], 'post', $full);
            $department = full_rel_name($var1['dptid'], 'department', $full);
            $status = mssql_result(mssql_query('SELECT title FROM [user_status_types] WHERE id=\'' . $var1['statusid'] . '\''), 0, 0);
            $dirid = mssql_result(mssql_query('SELECT dirid FROM [department] WHERE id=\'' . $var1['dptid'] . '\''), 0, 0);
            $comid = mssql_result(mssql_query('SELECT comid FROM [department] WHERE id=\'' . $var1['dptid'] . '\''), 0, 0);
            $cityid = mssql_result(mssql_query('SELECT cityid FROM [company] WHERE id=\'' . $comid . '\''), 0, 0);
            $direction = empty($dirid) ? '' : full_rel_name($dirid, 'direction', $full);
            $company = full_rel_name($comid, 'company', $full);
            $city = full_rel_name($cityid, 'city', $full);
            return array(
                'id' => $var1['id'],
                'login' => $var1['login'],
                'sname' => $var1['sname'],
                'name' => $var1['name'],
                'fname' => $var1['fname'],
                'status' => $status,
                'group' => $group,
                'post' => $post,
                'department' => $department,
                'direction' => $direction,
                'company' => $company,
                'city' => $city,
                //*
                'tel_work' => $var1['tel_work'],
                'tel_home' => $var1['tel_home'],
                'tel_mobile' => $var1['tel_mobile'],
                //*/
                'email' => $var1['email'],
                'imgid' => $var1['imgid'],
                'icq_uin' => $var1['icq_uin'],
                'jabber_id' => $var1['jabber_id'],
                'birthday' => $var1['birthday'],
                'inn' => $var1['inn']
            );
        } elseif ($table == 'user_id_array') {
            $var = mssql_fetch_array(mssql_query('SELECT id, grid, postid, dptid, statusid, T1C_tab, T1C_comid FROM [user] WHERE id=\'' . $id . '\''), MSSQL_ASSOC);
            $var['dirid'] = mssql_result(mssql_query('SELECT dirid FROM [department] WHERE id=\'' . $var['dptid'] . '\''), 0, 0);
            $var['comid'] = mssql_result(mssql_query('SELECT comid FROM [department] WHERE id=\'' . $var['dptid'] . '\''), 0, 0);
            $var['cityid'] = mssql_result(mssql_query('SELECT cityid FROM [company] WHERE id=\'' . $var['comid'] . '\''), 0, 0);
            return $var;
        } elseif ($table == 'user_info') {
            $var = mssql_fetch_array(mssql_query('SELECT * FROM [user_info] WHERE uid=\'' . $id . '\''), MSSQL_ASSOC);
            return $var;
        } elseif ($table == 'user_tel') {
            $q = mssql_query('SELECT tel, type FROM [user_tel] WHERE uid=\'' . $id . '\' ORDER BY type, tel');
            $ret_arr = array();
            while ($v = mssql_fetch_array($q, MSSQL_ASSOC)) {
                $ret_arr[$v['type']][] = $v['tel'];
            }
            return $ret_arr;
        } else {
            return '[' . $tid . ']';
        }
    }

    function scv_log_file($txt, $filename='cube_unavailable_log.txt') {
        $filename = dirname(__FILE__) . '/' . $filename;
        $file_exists = file_exists($filename);
        if (!$handle = fopen($filename, 'a'))
            return false;

        if (!$file_exists)
            fwrite($handle, '--------------------------------------------------------------------------------' . "\n" . '- ' . $filename . "\n" . '--------------------------------------------------------------------------------' . "\n\n");
        fwrite($handle, date('Y-m-d H:i:s') . "\t" . $txt . "\t" . $_SERVER['REQUEST_URI'] . "\n");

        fclose($handle);
        return true;
    }

    /*
      // compares two timestamps and returns array with differencies (year, month, day, hour, minute, second)
      function date_diff($d1, $d2) {
      //check higher timestamp and switch if neccessary
      if ($d1 < $d2){
      $temp = $d2;
      $d2 = $d1;
      $d1 = $temp;
      }
      else {
      $temp = $d1; //temp can be used for day count if required
      }
      $d1 = date_parse(date("Y-m-d H:i:s",$d1));
      $d2 = date_parse(date("Y-m-d H:i:s",$d2));
      //seconds
      if ($d1['second'] >= $d2['second']){
      $diff['second'] = $d1['second'] - $d2['second'];
      }
      else {
      $d1['minute']--;
      $diff['second'] = 60-$d2['second']+$d1['second'];
      }
      //minutes
      if ($d1['minute'] >= $d2['minute']){
      $diff['minute'] = $d1['minute'] - $d2['minute'];
      }
      else {
      $d1['hour']--;
      $diff['minute'] = 60-$d2['minute']+$d1['minute'];
      }
      //hours
      if ($d1['hour'] >= $d2['hour']){
      $diff['hour'] = $d1['hour'] - $d2['hour'];
      }
      else {
      $d1['day']--;
      $diff['hour'] = 24-$d2['hour']+$d1['hour'];
      }
      //days
      if ($d1['day'] >= $d2['day']){
      $diff['day'] = $d1['day'] - $d2['day'];
      }
      else {
      $d1['month']--;
      $diff['day'] = date("t",$temp)-$d2['day']+$d1['day'];
      }
      //months
      if ($d1['month'] >= $d2['month']){
      $diff['month'] = $d1['month'] - $d2['month'];
      }
      else {
      $d1['year']--;
      $diff['month'] = 12-$d2['month']+$d1['month'];
      }
      //years
      $diff['year'] = $d1['year'] - $d2['year'];
      return $diff;
      }
     */

//������� ������� (������ � ������)
    function img_resize($src, $dest, $width, $height, $rgb=0xFFFFFF, $quality=95) {
        if (!file_exists($src))
            return false;

        $size = getimagesize($src);

        if ($size == false)
            return false;

        // ���������� �������� ������ �� MIME-����������, ���������������
        // �������� getimagesize, � �������� ��������������� �������
        // imagecreatefrom-�������.

        $format = strtolower(substr($size['mime'], strpos($size['mime'], '/') + 1));
        $icfunc = "imagecreatefrom" . $format;
        if (!function_exists($icfunc))
            return false;

        $x_ratio = $width / $size[0];
        $y_ratio = $height / $size[1];

        $ratio = min($x_ratio, $y_ratio);
        $use_x_ratio = ($x_ratio == $ratio);

        $new_width = $use_x_ratio ? $width : floor($size[0] * $ratio);
        $new_height = !$use_x_ratio ? $height : floor($size[1] * $ratio);
        $new_left = $use_x_ratio ? 0 : floor(($width - $new_width) / 2);
        $new_top = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);

        // echo "<hr>memory: ";
        // echo ini_get("memory_limit");
        // ini_set("memory_limit","64M");
        // echo ini_get("memory_limit");
        // echo "p1w: {$size[0]}; p1h: {$size[1]}; p2w: {$width}; p2h: {$height}";
        // echo "<hr>";
        $isrc = $icfunc($src);
        $idest = imagecreatetruecolor($width, $height);

        $white = imagecolorallocate($idest, 255, 255, 255); 
        imagefill($idest, 0, 0, $white);
        imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0, $new_width, $new_height, $size[0], $size[1]);

        imagejpeg($idest, $dest, $quality);

        imagedestroy($isrc);
        imagedestroy($idest);

        return true;
    }

}
?>