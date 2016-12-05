
  # read

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 16:07:59 


      None


      <p>
      read: read variable from stdin
Usage:
read {VAR1} {VAR2} {VAR3}

1, space is the default split character
user input: name age = 2 variables, nameage = 1 variable

2,user can also input nothing
then the variable will be empty

how to check ? use 'test' . 

CODE:
read name 
if test -z $name ; then echo 'name empty';else echo 'name not empty'; fi

      </p>

  