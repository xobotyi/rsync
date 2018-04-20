#!/usr/bin/env bash

mkdir ~/sshd/

cat > ~/sshd/sshd_config <<-EOF
	Port 2222
	ListenAddress 0.0.0.0
	Protocol 2
	HostKey ${HOME}/sshd/id_rsa_rsync_test
	PidFile ${HOME}/sshd/pid
	PasswordAuthentication yes
	PubkeyAuthentication yes
	ChallengeResponseAuthentication no
	UsePAM no
EOF

ssh-keygen -t rsa -f ~/sshd/id_rsa_rsync_test -N "" -q
/usr/sbin/sshd -f ~/sshd/sshd_config

ssh-keygen -t rsa -f ~/.ssh/id_rsa_rsync_test -N "" -q
cat ~/.ssh/id_rsa_rsync_test.pub >> ~/.ssh/authorized_keys

while read algorithm key comment; do
    echo "[localhost]:2222 $algorithm $key" >> ~/.ssh/known_hosts

done < ~/sshd/id_rsa_rsync_test.pub