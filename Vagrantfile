VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

    config.vm.box = "symfony-v0.4.4"
    config.vm.hostname = "abc.example.net"

    config.vm.provider :virtualbox do |v|
        v.customize ["modifyvm", :id, "--memory", 1024]
    end

    config.vm.network :forwarded_port, guest: 80, host: 8880, host_ip: "127.0.0.1"

end
