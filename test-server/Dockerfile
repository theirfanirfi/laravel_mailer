FROM centos:7

RUN yum update -y && \
    yum install -y openssh-server openssh-clients nano sudo && \
    yum clean all

RUN ssh-keygen -A

RUN useradd -rm -d /home/ubuntu -s /bin/bash -g root -G wheel -u 1000 test

# Set password for root user
RUN echo 'root:toor' | chpasswd

# Enable password authentication for SSH
RUN sed -i 's/#PermitRootLogin yes/PermitRootLogin yes/' /etc/ssh/sshd_config

# RUN echo "service sshd start" >> /root/.bashrc

EXPOSE 22

CMD ["/usr/sbin/sshd", "-D"]
