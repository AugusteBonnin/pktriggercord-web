#!/bin/bash
while true ; do
pktriggercord-cli -o capture
filename=$(date -u +"%Y-%m-%d_%Hh%Mm%Ss").jpg
cp capture-0000.jpg photos/$filename
if [ -f photos.tar ] ; then
                tar rf photos.tar photos
            else
                tar cf photos.tar photos
            fi ;
mv photos/* compressed/
sleep $1
done ;
