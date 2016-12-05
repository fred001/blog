
  # newlisp总结

      version:  1
      created_at:  2016-04-13
      updated_at:  None

      created at 2016-04-13 16:27:01 


      None


      <p>
      newlisp 和原生common lisp 很不一样。精简很多，并且包含大量模块。

执行shell cmd  
(exec "ls")

基本格式： (keyword expression1 expression2 expression3 ...)
基本数据:  整数  1 2  字符串 "aa"
变量  (set 'name "frd")
使用变量 (print  name)
列表  '(1 2 3 )  注意前面的 '

(set 'x 4)
(define  x 4)
(sef  y 4)
(setq  y 4)


IF:
	(if  CONDITION  TRUE_ACTION  FALSE_ACTION)
	(if (and socket (net-confirm-request))     ; test
    (net-flush)                            ; action when true
    (finish "could not connect"))          ; action when false
(if
 (< x 0)      (define a "impossible")
 (< x 10)     (define a "small")
 (< x 20)     (define a "medium")
 (>= x 20)    (define a "large")
 )



循环：
	(dolist (i (sequence -5 5))
 (println "Element " $idx ": " i))


(dotimes (c 10)
 (println c " times 3 is " (* c 3)))
(for (c 1 -1 .5)
 (println c))


(until (disk-full?)
 (println "Adding another file")
 (add-file)
 (inc counter))

(do-until (disk-full?)
 (println "Adding another file")
 (add-file)
 (inc counter))

(case n
  ((- 2 1)     (println "un"))
  ((+ 2 0)     (println "deux"))
  ((- 6 3)     (println "trois"))
  ((/ 16 4)    (println "quatre"))
  (true        (println "je ne sais quoi")))

(cond
  ((< x 0)       (define a "impossible") )
  ((< x 10)      (define a "small")      )
  ((< x 20)      (define a "medium")     )
  ((>= x 20)     (define a "large")      )
 )

(let 
   (x (* 2 2)
    y (* 3 3)
    z (* 4 4)) 
   ; end of initialization
 (println x)
 (println y)
 (println z))


(define (func1)
 (expression-1)
 (expression-2) 
; ...
 (expression-n)
)

Local variables

Sometimes you want functions that change the values of symbols elsewhere in your code, and sometimes you want functions that don't - or can't. The following function, when run, changes the value of the x symbol, which may or may not be defined elsewhere in your code:

(define (changes-symbol)
 (set 'x 15)
 (println "x is " x))
 
(set 'x 10)
;-> x is 10

(changes-symbol)



If you don't want this to happen, use let or letn to define a local x, which doesn't affect the x symbol outside the function:

(define (does-not-change-x)
 (let (x 15)
    (println "my x is " x)))
 
(set 'x 10)


默认值
(define (foo (a 1) b (c 2))
 (println a " " b " " c))



(define (test v1)
 (println "the arguments were " v1 " and " (args)))

(test)



	 
      </p>

  