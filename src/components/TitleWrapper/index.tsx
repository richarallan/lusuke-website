import * as S from './styles'

type TitleWrapperProps = {
  children: React.ReactNode
}

const TitleWrapper = ({ children }: TitleWrapperProps) => (
  <S.TitleWrapper>{children}</S.TitleWrapper>
)

export default TitleWrapper
