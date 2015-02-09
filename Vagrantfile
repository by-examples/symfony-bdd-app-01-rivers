VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

    config.vm.box = "gajdaw/symfony"
    config.vm.hostname = "abc.example.net"

    config.vm.provider :virtualbox do |v|
        v.customize ["modifyvm", :id, "--memory", 1024]
    end

    config.vm.network :forwarded_port, guest: 80, host: 8880, host_ip: "127.0.0.1"

    currentDirectory = Dir.pwd
    config.vm.provision "shell", inline: "echo #{currentDirectory} > box-directory.txt"

end
