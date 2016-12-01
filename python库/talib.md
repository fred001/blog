https://github.com/mrjbq7/ta-lib

import numpy
import talib

close = numpy.random.random(100)
  talib.MA(close,timeperiod=3) #返回一个数组

#返回三个数组，分别是三条线的值
#分别是 DIFF , DEF, MACD值 (BAR)
talib.MACD(real[, fastperiod=?, slowperiod=?, signalperiod=?]) 

## ADX

# talib.ADX(high, low, close[, timeperiod=?])

  »> high=np.array([3.1,3.2,3.3,3.4,3.5,3.6,3.7,3.8,3.9])
  »> low=np.array([1.1,1.2,1.3,1.4,1.5,1.6,1.7,1.8,1.9])
  »> close=np.array([2.1,2.2,2.3,2.4,2.5,2.6,2.7,2.8,2.9])
  »> talib.ADX(high,low,close,3)
array([  nan,   nan,   nan,   nan,   nan,  100.,  100.,  100.,  100.])

  talib.PLUS_DI(high, low, close, timeperiod=t)
  talib.MINUS_DI(high, low, close, timeperiod=t)

  talib.PLUS_DM(high, low, close, timeperiod=t)
  talib.MINUS_DM(high, low, close, timeperiod=t)

talib.DX(high, low, close, timeperiod=t)


  talib.SAR(high, low[, acceleration=?, maximum=?]) #返回一个数组

  talib.RSI(real[, timeperiod=?])
  talib.WILLR(high, low, close[, timeperiod=?])
talib.CCI(high, low, close[, timeperiod=?])

#布林带，返回三个数组
talib.BBANDS(real[, timeperiod=?, nbdevup=?, nbdevdn=?, matype=?])

#能量潮
talib.OBV(real, volume)




###产生数据（不可考， low 必须 < high)
  inputs = {
    'open': np.random.random(100),
    'high': np.random.random(100),
    'low': np.random.random(100),
    'close': np.random.random(100),
    'volume': np.random.random(100)
  }

