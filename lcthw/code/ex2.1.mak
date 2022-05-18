CFLAGS=-Wall -g #-fsanitize=address -fno-omit-frame-pointer

all: ex1 ex3 ex7 ex8 ex9 ex10 ex10s ex11 ex11s ex12 ex13 ex13s ex14 ex14s ex15 \
	ex15s ex16 ex16s ex17 ex17ss ex17sss ex18 ex18s ex19 ex20 ex21 ex23 ex24 ex25 \
	ex26 ex26s glob logfind ex18ss ex27 ex28s

ex23s:

ex22_main: ex22_main ex22.o

ex22.o:

clean:
	rm -f ex1 ex3 ex7 ex8 ex9 ex10 ex10s ex11 ex11s ex12 ex13 ex13s ex14 ex14s ex15 \
	ex15s ex16 ex16s ex17 ex17ss ex17sss ex18 ex18s ex19 ex20 ex21 ex22.o ex22_main \
	ex23 ex23s ex24 ex25 ex26 ex26s glob logfind ex18ss ex27 ex28s
