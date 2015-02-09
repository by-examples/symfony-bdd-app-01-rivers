# This manifest is supposed to work on travis only
# It was not tested on other hosts
#

#
# The file travis-config.txt is created in .travis.yml
#
$tmp_pwd = generate('/bin/cat', '/tmp/travis-pwd.txt')
$final_pwd = inline_template('<%= @tmp_pwd.strip %>')
notify { "FINAL PWD: ${final_pwd}": }

class { 'symfony':
    username        => 'travis',
    directory       => "${final_pwd}/web",
#    directory       => '/home/travis/build/some/dir',
    withEnvironment => false,
    withNodejs      => false,
    withAllPhars    => false,
}
