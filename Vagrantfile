VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

#    config.vm.box = "symfony-v0.5.9"
#    config.vm.box = "packer_symfony-v0.5.9_virtualbox"
    config.vm.box = "gajdaw/symfony"
    config.vm.hostname = "abc.example.net"

    config.vm.network :forwarded_port, guest: 80, host: 8880, host_ip: "127.0.0.1"

end
