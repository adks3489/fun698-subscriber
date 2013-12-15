#!/bin/tcsh
set count = `cat video.list | wc -l`
set i = 1
while( $i <= $count )
  set url = `cat video.list | awk 'NR=='$i'{print $2}'`
  wget --quiet -O script/$i $url
  set time = `cat script/$i | sed -n 's_.*更新時間：\(.\{19\}\).*_"\1"_p' | xargs date +%s -d`
  set newtime = `date +%s`
  set d = `expr $newtime - $time`
  if( $d < 86400 ) then
      set name = `cat video.list | awk 'NR=='$i'{print $1}'`
#      printf "`echo $name | sed 's_&#[0-9]*;_%x _g'`" `echo $name | sed 's_&#\([0-9]*\);_ \1_g'`
#      sed 's_[0-9a-f]* _\u_g'
      echo "$name Update: $url" | mail --append="Content-type: text/html" -s "$name - Update" adks3489@gmail.com
  endif
  @ i++
end
