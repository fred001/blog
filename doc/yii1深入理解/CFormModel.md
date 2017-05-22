

rules() 方法返回所有验证规则
  对于 authenticate ，并不存在这个规则， 但是会创建一个CInlineValidator 对象， 使用 CFormModel 本身存在的方法进行验证

  所以最后 authenticate 对应了 CFormModel 本身的 authenticate方法
