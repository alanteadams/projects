from sys import argv
from os.path import exists
import time

seconds = time.time()
print("Seconds since epoch: ", seconds)
local_time = time.ctime(seconds)
print("Local Time:", local_time)

free = 2019, 9, 7, 6, 20, 55, 6, 288, 0
#returns seconds from struct time
local_time2 = time.mktime(free)
print("Local Time: ", local_time2)

#returns stuct time.
result = time.localtime(seconds)
print("Result: ", result)
print("Year: ", result.tm_year)
#the asctime can take paremeters(free), or a stuct_time object(result). Return a formatted string.
result2 = time.asctime(result)
result3 = time.asctime(free)
print("Result2: ", result2, "Made this shit up passed as paremeters: ", result3)

#"%m/%d/%Y, :%S
time_string = int(time.strftime("%H%M", result))
print(time_string)


script, from_file, to_file = argv

print(f"Copying {from_file} to {to_file}")

# we could do these two on one line, how?
in_file = open(from_file)
indata = in_file.read()

print(f"The input file is {len(indata)} bytes long")

print(f"Does the output file exists? {exists(to_file)}")
print("Ready, hit RETURN to continue CTRL-C to abort. Loading approx. 15 seconds...")
time.sleep(15)
time_string2 = input("Please input the time for the alarm in HHMM:/n")
#return a string as a struct_time object
result4 = time.strptime(time_string2, "%d, %B %Y")
print(result4)

out_file = open(to_file, 'w')
out_file.write(indata)

print("Alright, all done.")

#out_file.close()
#in_file.close()
